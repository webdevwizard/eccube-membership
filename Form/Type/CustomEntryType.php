<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\LoginPlugin\Form\Type;

use Eccube\Form\Type\Front\EntryType;
use Eccube\Form\Type\Master\SexType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class CustomEntryType extends EntryType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);        
        $builder->add('company_name', TextType::class, $options);
        // $builder->add('notify', SexType::class,[
        //     'required' => false,
        // ]);
    }
}
