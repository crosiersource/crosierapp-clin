<?php

namespace App\Form\Pessoal;

use App\Entity\Pessoal\Profissional;
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
class ProfissionalType extends AbstractType
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
        $jsonMetadata = json_decode($repoAppConfig->findByChave('est_profissional_json_metadata'), true);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($jsonMetadata) {
            /** @var Profissional $profissional */
            $profissional = $event->getData();
            $builder = $event->getForm();

            $builder->add('nome', TextType::class, [
                'label' => 'Nome',
                'attr' => ['class' => 'focusOnReady'],
            ]);

            $builder->add('jsonData', JsonType::class, ['jsonMetadata' => $jsonMetadata, 'jsonData' => $profissional->jsonData]);

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
            'data_class' => Profissional::class
        ]);
    }
}