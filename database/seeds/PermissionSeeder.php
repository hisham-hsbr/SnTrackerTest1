<?php

use Bitfumes\Multiauth\Model\Permission;
use Faker\Provider\ar_JO\Person;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for - user
        Permission::create([
            'name' => 'CreateUser',
            'parent' => 'User',
        ]);
        Permission::create([
            'name' => 'ReadUser',
            'parent' => 'User',
        ]);
        Permission::create([
            'name' => 'UpdateUser',
            'parent' => 'User',
        ]);
        Permission::create([
            'name' => 'DeleteUser',
            'parent' => 'User',
        ]);
        Permission::create([
            'name' => 'CreatedBy',
            'parent' => 'User',
        ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'User',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'User',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'User',
        ]);


        // //for - Role
        // Permission::create([
        //     'name' => 'CreateRole',
        //     'parent' => 'Role',
        // ]);
        // Permission::create([
        //     'name' => 'ReadRole',
        //     'parent' => 'Role',
        // ]);
        // Permission::create([
        //     'name' => 'UpdateRole',
        //     'parent' => 'Role',
        // ]);
        // Permission::create([
        //     'name' => 'DeleteRole',
        //     'parent' => 'Role',
        // ]);


        //for - Permission
        Permission::create([
            'name' => 'CreatePermission',
            'parent' => 'Permission',
        ]);
        Permission::create([
            'name' => 'ReadPermission',
            'parent' => 'Permission',
        ]);
        Permission::create([
            'name' => 'UpdatePermission',
            'parent' => 'Permission',
        ]);
        Permission::create([
            'name' => 'DeletePermission',
            'parent' => 'Permission',
        ]);
        Permission::create([
            'name' => 'CreatedBy',
            'parent' => 'Permission',
        ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'Permission',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'Permission',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'Permission',
        ]);





        //for - Product
        Permission::create([
            'name' => 'CreateProduct',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'ReadProduct',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'UpdateProduct',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'DeleteProduct',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'CreatedBy',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'Product',
        ]);
        Permission::create([
            'name' => 'StatusProduct',
            'parent' => 'Product',
        ]);



        //for - Customer
        Permission::create([
            'name' => 'CreateCustomer',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'ReadCustomer',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'UpdateCustomer',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'DeleteCustomer',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'CreatedBy',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'Customer',
        ]);
        Permission::create([
            'name' => 'StatusCustomer',
            'parent' => 'Customer',
        ]);



        //for - Supplier
        Permission::create([
            'name' => 'CreateSupplier',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'ReadSupplier',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'UpdateSupplier',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'DeleteSupplier',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'CreatedBy',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'Supplier',
        ]);
        Permission::create([
            'name' => 'StatusSupplier',
            'parent' => 'Supplier',
        ]);




        //for - SerialNumber
        Permission::create([
            'name' => 'CreateSerialNumber',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'ReadSerialNumber',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'UpdateSerialNumber',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'DeleteSerialNumber',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'CreatedBy',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'SerialNumber',
        ]);
        Permission::create([
            'name' => 'StatusSerialNumber',
            'parent' => 'SerialNumber',
        ]);


        //for - BottomPrice
        Permission::create([
            'name' => 'CreateBottomPrice',
            'parent' => 'BottomPrice',
        ]);
        Permission::create([
            'name' => 'ReadBottomPrice',
            'parent' => 'BottomPrice',
        ]);
        Permission::create([
            'name' => 'UpdateBottomPrice',
            'parent' => 'BottomPrice',
        ]);
        Permission::create([
            'name' => 'DeleteBottomPrice',
            'parent' => 'BottomPrice',
        ]);
        Permission::create([
            'name' => 'ExportBottomPrice',
            'parent' => 'BottomPrice',
        ]);
        Permission::create([
            'name' => 'ImportBottomPrice',
            'parent' => 'BottomPrice',
        ]);




        //for - Bottom
        Permission::create([
            'name' => 'ReadCodeBottom',
            'parent' => 'Bottom',
        ]);
        Permission::create([
            'name' => 'ReadNameBottom',
            'parent' => 'Bottom',
        ]);

        Permission::create([
            'name' => 'ReadFirstBottom',
            'parent' => 'Bottom',
        ]);

        Permission::create([
            'name' => 'ReadSecondBottom',
            'parent' => 'Bottom',
        ]);

        Permission::create([
            'name' => 'ReadThirdBottom',
            'parent' => 'Bottom',
        ]);

        Permission::create([
            'name' => 'ReadLastBottom',
            'parent' => 'Bottom',
        ]);

        Permission::create([
            'name' => 'ReadRtBottom',
            'parent' => 'Bottom',
        ]);

        Permission::create([
            'name' => 'ReadModelBottom',
            'parent' => 'Bottom',
        ]);
        Permission::create([
            'name' => 'ReadDivisionBottom',
            'parent' => 'Bottom',
        ]);
        Permission::create([
            'name' => 'ReadBrandBottom',
            'parent' => 'Bottom',
        ]);
        Permission::create([
            'name' => 'CreatedBy',
            'parent' => 'Bottom',
        ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'Bottom',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'Bottom',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'Bottom',
        ]);
        Permission::create([
            'name' => 'StatusBottom',
            'parent' => 'Bottom',
        ]);



        //for - BR-ATJ
        Permission::create([
            'name' => 'CreateBR-ATJ',
            'parent' => 'BR-ATJ',
        ]);
        Permission::create([
            'name' => 'ReadBR-ATJ',
            'parent' => 'BR-ATJ',
        ]);
        Permission::create([
            'name' => 'UpdateBR-ATJ',
            'parent' => 'BR-ATJ',
        ]);
        Permission::create([
            'name' => 'DeleteBR-ATJ',
            'parent' => 'BR-ATJ',
        ]);



        //for - Enquiries
        Permission::create([
            'name' => 'CreateEnquiries',
            'parent' => 'Enquiries',
        ]);
        Permission::create([
            'name' => 'ReadEnquiries',
            'parent' => 'Enquiries',
        ]);
        Permission::create([
            'name' => 'UpdateEnquiries',
            'parent' => 'Enquiries',
        ]);
        Permission::create([
            'name' => 'DeleteEnquiries',
            'parent' => 'Enquiries',
        ]);
        Permission::create([
            'name' => 'CreatedBy',
            'parent' => 'Enquiries',
        ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'Enquiries',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'Enquiries',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'Enquiries',
        ]);
        Permission::create([
            'name' => 'StatusEnquiries',
            'parent' => 'Enquiries',
        ]);



        //for - Reports
        Permission::create([
            'name' => 'CreateReports',
            'parent' => 'Reports',
        ]);
        Permission::create([
            'name' => 'ReadReports',
            'parent' => 'Reports',
        ]);
        Permission::create([
            'name' => 'UpdateReports',
            'parent' => 'Reports',
        ]);
        Permission::create([
            'name' => 'DeleteReports',
            'parent' => 'Reports',
        ]);
        Permission::create([
            'name' => 'CreatedBy',
            'parent' => 'Reports',
        ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'Reports',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'Reports',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'Reports',
        ]);
        Permission::create([
            'name' => 'StatusReports',
            'parent' => 'Reports',
        ]);


        //for - Brand
        Permission::create([
            'name' => 'CreateBrand',
            'parent' => 'Brand',
        ]);
        Permission::create([
            'name' => 'ReadBrand',
            'parent' => 'Brand',
        ]);
        Permission::create([
            'name' => 'UpdateBrand',
            'parent' => 'Brand',
        ]);
        Permission::create([
            'name' => 'DeleteBrand',
            'parent' => 'Brand',
        ]);
        Permission::create([
            'name' => 'CreatedBy',
            'parent' => 'Brand',
        ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'Brand',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'Brand',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'Brand',
        ]);
        Permission::create([
            'name' => 'StatusBrand',
            'parent' => 'Brand',
        ]);



        //for - Division
        Permission::create([
            'name' => 'CreateDivision',
            'parent' => 'Division',
        ]);
        Permission::create([
            'name' => 'ReadDivision',
            'parent' => 'Division',
        ]);
        Permission::create([
            'name' => 'UpdateDivision',
            'parent' => 'Division',
        ]);
        Permission::create([
            'name' => 'DeleteDivision',
            'parent' => 'Division',
        ]);
        Permission::create([
                'name' => 'CreatedBy',
                'parent' => 'Division',
            ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'Division',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'Division',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'Division',
        ]);
        Permission::create([
            'name' => 'StatusDivision',
            'parent' => 'Division',
        ]);





        //for - Branch
        Permission::create([
            'name' => 'CreateBranch',
            'parent' => 'Branch',
        ]);
        Permission::create([
            'name' => 'ReadBranch',
            'parent' => 'Branch',
        ]);
        Permission::create([
            'name' => 'UpdateBranch',
            'parent' => 'Branch',
        ]);
        Permission::create([
            'name' => 'DeleteBranch',
            'parent' => 'Branch',
        ]);
        Permission::create([
                'name' => 'CreatedBy',
                'parent' => 'Branch',
            ]);
        Permission::create([
            'name' => 'UpdatedBy',
            'parent' => 'Branch',
        ]);
        Permission::create([
            'name' => 'CreatedOn',
            'parent' => 'Branch',
        ]);
        Permission::create([
            'name' => 'UpdatedOn',
            'parent' => 'Branch',
        ]);
        Permission::create([
            'name' => 'StatusBranch',
            'parent' => 'Branch',
        ]);





        //                 //for - user
        // Permission::create([
        //     'name' => 'Create',
        //     'parent' => '',
        // ]);
        // Permission::create([
        //     'name' => 'Read',
        //     'parent' => '',
        // ]);
        // Permission::create([
        //     'name' => 'Update',
        //     'parent' => '',
        // ]);
        // Permission::create([
        //     'name' => 'Delete',
        //     'parent' => '',
        // ]);
    }
}
