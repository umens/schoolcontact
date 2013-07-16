<?php
namespace Schoolcontact\FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AddFormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom');
        $builder->add('type');
        $builder->add('duree');
        $builder->add('description');
    }

    public function getName()
    {
        return 'formation';
    }
}
?>