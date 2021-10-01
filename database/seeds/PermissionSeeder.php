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
