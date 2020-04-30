<?php

namespace App\Form\Pessoal;

use App\Entity\Pessoal\Contrato;
use CrosierSource\CrosierLibBaseBundle\Entity\Config\AppConfig;
use CrosierSource\CrosierLibBaseBundle\Form\JsonType;
use CrosierSource\CrosierLibBaseBundle\Repository\Config\AppConfigRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 *
 * @author Carlos Eduardo Pauluk
 */
class ContratoType extends AbstractType
{

    /** @var EntityManagerInterface */
    private EntityManagerInterface $doctrine;

    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var AppConfigRepository $repoAppConfig */
        $repoAppConfig = $this->doctrine->getRepository(AppConfig::class);
        $jsonMetadata = json_decode($repoAppConfig->findByChave('est_contrato_json_metadata'), true);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($jsonMetadata) {
            /** @var Contrato $contrato */
            $contrato = $event->getData();
            $builder = $event->getForm();

            $builder->add('descricao', TextType::class, [
                'label' => 'Descrição',
                'attr' => ['class' => 'focusOnReady'],
            ]);

            $builder->add('jsonData', JsonType::class, ['jsonMetadata' => $jsonMetadata, 'jsonData' => $contrato->jsonData]);

        });


        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) use ($jsonMetadata) {

                $builder = $event->getForm();
                $data = $event->getData();

                $builder->remove('jsonData');
                $builder->add('jsonData', JsonType::class, ['jsonMetadata' => $jsonMetadata, 'jsonData' => $data['jsonData'] ?? null]);

            }
        );

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contrato::class
        ]);
    }
}