<?php

namespace App\Datatable;

use Kreyu\Bundle\DataTableBundle\Column\Type\NumberColumnType;
use Kreyu\Bundle\DataTableBundle\Column\Type\TextColumnType;
use Kreyu\Bundle\DataTableBundle\Type\AbstractDataTableType;
use Kreyu\Bundle\DataTableBundle\DataTableBuilderInterface;

class ProductDataTableType extends AbstractDataTableType
{
    public function buildDataTable(DataTableBuilderInterface $builder, array $options): void
    {
        $builder
            ->addColumn('categoryName', TextColumnType::class, [
                'label' => 'Category Name',
                'property_path' => '[categoryName]'
            ])
            ->addColumn('salesAmountSum', NumberColumnType::class, [
                'label' => 'Sum Sales Amount',
                'property_path' => '[salesAmountSum]'
            ])
        ;
    }
}