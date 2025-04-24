<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SecondsType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$builder
			->add('seconds', IntegerType::class, [
				'label' => 'Enter seconds:',
				'attr' => ['min' => 0]
			])->add('submit', SubmitType::class, [
				'label' => 'Generate Readable Date'
			]);
	}

	public function configureOptions(OptionsResolver $resolver): void
	{
		$resolver->setDefaults([
			// Configure your form options here
			'csrf_protection' => true,
			'csrf_field_name' => '_token',
			'csrf_token_id'   => 'seconds_form',
		]);
	}
}
