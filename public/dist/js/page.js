$(document).ready(function () {
    var row_id = 0;

    if (location.pathname == '/customers') {

        $('.page-header').html('Customers');
        $('.panel-heading').html('Add, Edit, Delete customers');

        $('thead tr').append( $('<th />', {text : 'ID'}) );
        $('thead tr').append( $('<th />', {text : 'Name'}) );
        $('thead tr').append( $('<th />', {text : 'Address'}) );
        $('thead tr').append( $('<th />', {text : 'Email'}) );
        $('thead tr').append( $('<th />', {text : 'Phone'}) );

        $('#table').on( 'click', 'tr', function () {
            try {
                row_id = table.row( this ).data().id;
                editor.s.ajax.edit.url = '/api/customers';
                editor.s.ajax.remove.url = '/api/customers';
            }
            catch (e) {

            }
        } );

        var table = $('#table').DataTable({
            'responsive': true,
            "ajax": {
                "url": "/api/customers",
                "type": "GET"
            },
            "columns": [
                {"data": "id"},
                {"data": "name"},
                {"data": "address"},
                {"data": "phone"},
                {"data": "email"}
            ],
            'bPaginate': false,
            'select': true,
            "bInfo": false,
            "bLengthChange" : false
        });

        editor = new $.fn.dataTable.Editor( {

            ajax: {
                create: {
                    type: 'POST',
                    url: '/api/customers',
                    data: function(d){
                        d.name= $("#DTE_Field_name").val();
                        d.address= $("#DTE_Field_address").val();
                        d.phone= $("#DTE_Field_phone").val();
                        d.email= $("#DTE_Field_email").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        table.ajax.reload();
                        $.notify('New customer added.', 'success');
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                edit: {
                    type: 'PATCH',
                    url:  '/api/customers',
                    data: function(d){
                        d.id = row_id;
                        d.name= $("#DTE_Field_name").val();
                        d.address= $("#DTE_Field_address").val();
                        d.phone= $("#DTE_Field_phone").val();
                        d.email= $("#DTE_Field_email").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Customer updated.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                remove: {
                    type: 'DELETE',
                    url:  '/api/customers',
                    data: function(d){
                        d.id = row_id;
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Customer has been trashed.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                }
            },
            table: "#table",
            'idSrc': 'id',
            fields: [ {
                label: "ID:",
                name: "id",
                type:  "readonly",
            }, {
                label: "Name:",
                name: "name"
            }, {
                label: "Address:",
                name: "address",
                type: "textarea"
            },{
                label: "Phone:",
                name: "phone",
                attr: {
                    "type": "number"
                }
            },{
                label: "Email:",
                name: "email"
            }
            ],
            i18n: {
                create: {
                    title:  "Add Customer"
                },
                edit: {
                    title:  "Edit Customer"
                },
                remove: {
                    title:  "Trash Customer"
                }
            }
        } );

        new $.fn.dataTable.Buttons( table, [
            { extend: "create", className: 'btn btn-primary', editor: editor },
            { extend: "edit",  className: 'btn btn-default',  editor: editor },
            { extend: "remove", className: 'btn btn-danger', editor: editor,
                formMessage: function ( e, dt ) {
                    return 'Are you sure you want to trash the customer?';
                }
            }
        ] );

        table.buttons().container()
            .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

    }
    else if (location.pathname == '/employees') {

        $('.page-header').html('Employees');
        $('.panel-heading').html('Add, Edit, Delete employees');

        $('thead tr').append( $('<th />', {text : 'ID'}) );
        $('thead tr').append( $('<th />', {text : 'Name'}) );
        $('thead tr').append( $('<th />', {text : 'Address'}) );
        $('thead tr').append( $('<th />', {text : 'Phone'}) );
        $('thead tr').append( $('<th />', {text : 'Gender'}) );
        $('thead tr').append( $('<th />', {text : 'Date of joining'}) );

        $('#table').on( 'click', 'tr', function () {
            try {
                row_id = table.row( this ).data().id;
                editor.s.ajax.edit.url = '/api/employees';
                editor.s.ajax.remove.url = '/api/employees';
            }
            catch (e) {

            }
        } );

        var table = $('#table').DataTable({
            'responsive': true,
            "ajax": {
                "url": "/api/employees",
                "type": "GET",
            },
            "columns": [
                {"data": "id"},
                {"data": "name"},
                {"data": "address"},
                {"data": "phone"},
                {"data": "gender"},
                {"data": "doj"}
            ],
            'bPaginate': false,
            'select': true,
            "bInfo": false,
            "bLengthChange" : false
        });

        editor = new $.fn.dataTable.Editor( {

            ajax: {
                create: {
                    type: 'POST',
                    url: '/api/employees',
                    data: function(d){
                        d.table = true,
                        d.name= $("#DTE_Field_name").val();
                        d.address= $("#DTE_Field_address").val();
                        d.phone= $("#DTE_Field_phone").val();
                        d.gender= $("input[name='gender']:checked").val();
                        d.doj= $("#DTE_Field_doj").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        table.ajax.reload();
                        $.notify('New employee added.', 'success');
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                edit: {
                    type: 'PATCH',
                    url:  '/api/employees',
                    data: function(d){
                        d.id = row_id;
                        d.name= $("#DTE_Field_name").val();
                        d.address= $("#DTE_Field_address").val();
                        d.phone= $("#DTE_Field_phone").val();
                        d.gender= $("input[name='gender']:checked").val();
                        d.doj= $("#DTE_Field_doj").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Employee updated.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                remove: {
                    type: 'DELETE',
                    url:  '/api/employees',
                    data: function(d){
                        d.id = row_id;
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Employee has been trashed.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                }
            },
            table: "#table",
            'idSrc': 'id',
            fields: [ {
                label: "ID:",
                name: "id",
                type:  "readonly",
            }, {
                label: "Name:",
                name: "name"
            }, {
                label: "Address:",
                name: "address",
                type: "textarea"
            },{
                label: "Phone:",
                name: "phone",
                attr: {
                    "type": "number"
                }
            },{
                label: "Gender:",
                name: "gender",
                type: "radio",
                "ipOpts": [
                    { "label": "Male", "value": "M" },
                    { "label": "Female",           "value": "F" }
                ]
            }, {
                label: "Date of joining:",
                name: "doj",
                type: "datetime",
                attr: {
                    "placeholder": "YYYY-MM-DD"

                }
            }
            ],
            i18n: {
                create: {
                    title:  "Add Employee"
                },
                edit: {
                    title:  "Edit Employee"
                },
                remove: {
                    title:  "Trash Employee"
                }
            }
        } );

        new $.fn.dataTable.Buttons( table, [
            { extend: "create", className: 'btn btn-primary', editor: editor },
            { extend: "edit",  className: 'btn btn-default',  editor: editor },
            { extend: "remove", className: 'btn btn-danger', editor: editor,
                formMessage: function ( e, dt ) {
                    return 'Are you sure you want to trash the employee?';
                }
            }
        ] );

        table.buttons().container()
            .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

    }else if (location.pathname == '/users') {

        $('.page-header').html('Users');
        $('.panel-heading').html('Add, Edit, Delete users');

        $('thead tr').append( $('<th />', {text : 'ID'}) );
        $('thead tr').append( $('<th />', {text : 'Employee'}) );
        $('thead tr').append( $('<th />', {text : 'Email'}) );
        $('thead tr').append( $('<th />', {text : 'Admin'}) );

        $('#table').on( 'click', 'tr', function () {
            try {
                row_id = table.row( this ).data().id;
                editor.s.ajax.edit.url = '/api/users';
                editor.s.ajax.remove.url = '/api/users';
            }
            catch (e) {

            }
        } );

        var table = $('#table').DataTable({
            'responsive': true,
            "ajax": {
                "url": "/api/users",
                "type": "GET",
            },
            "columns": [
                {"data": "id"},
                {"data": "employee.name"},
                {"data": "email"},
                {"data": "admin"}
            ],
            'bPaginate': false,
            'select': true,
            "bInfo": false,
            "bLengthChange" : false
        });

        editor = new $.fn.dataTable.Editor( {

            ajax: {
                create: {
                    type: 'POST',
                    url: '/api/users',
                    data: function(d){
                        d.table = true,
                        d.emp_id= $("#DTE_Field_emp_id").val();
                        d.email= $("#DTE_Field_email").val();
                        d.admin= $("input[name='admin']:checked").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        table.ajax.reload();
                        $.notify('New user added.', 'success');
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                edit: {
                    type: 'PATCH',
                    url:  '/api/users',
                    data: function(d){
                        d.id = row_id;
                        d.emp_id= $("#DTE_Field_emp_id").val();
                        d.email= $("#DTE_Field_email").val();
                        d.admin= $("input[name='admin']:checked").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('User updated.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                remove: {
                    type: 'DELETE',
                    url:  '/api/users',
                    data: function(d){
                        d.id = row_id;
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('User has been trashed.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                }
            },
            table: "#table",
            'idSrc': 'id',
            fields: [ {
                label: "ID:",
                name: "id",
                type:  "readonly",
            }, {
                    label: "Employee:",
                    name: "emp_id",
                    type: "select"
            }, {
                label: "Email:",
                name: "email"
            },{
                label: "Admin:",
                name: "admin",
                type: "radio",
                "ipOpts": [
                    { "label": "Yes", "value": 1 },
                    { "label": "No", "value": 0 }
                ]
            }
            ],
            i18n: {
                create: {
                    title:  "Add User"
                },
                edit: {
                    title:  "Edit User"
                },
                remove: {
                    title:  "Trash User"
                }
            }
        } );

        $.ajax({
            url: '/api/employees',
            type: 'GET',
            data: {},
            success: function (response) {

                var employee_info = [];
                response = $.parseJSON(response);
                var data = response['data'];
                for (var i = 0; i < data.length; i++) {
                    employee_info.push({label: data[i]['id'] + ' - ' + data[i]['name'], value: data[i]['id']});
                }
                editor.field('emp_id').update(employee_info);

            }, error: function () {
                $.notify('There was an error fetching employee data.');
            }
        });

        new $.fn.dataTable.Buttons( table, [
            { extend: "create", className: 'btn btn-primary', editor: editor },
            { extend: "edit",  className: 'btn btn-default',  editor: editor },
            { extend: "remove", className: 'btn btn-danger', editor: editor,
                formMessage: function ( e, dt ) {
                    return 'Are you sure you want to trash the user?';
                }
            }
        ] );

        table.buttons().container()
            .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

    }
   else if (location.pathname == '/merchants') {

        $('.page-header').html('Merchants');
        $('.panel-heading').html('Add, Edit, Delete merchants');

        $('thead tr').append( $('<th />', {text : 'ID'}) );
        $('thead tr').append( $('<th />', {text : 'Name'}) );
        $('thead tr').append( $('<th />', {text : 'Address'}) );
        $('thead tr').append( $('<th />', {text : 'Email'}) );
        $('thead tr').append( $('<th />', {text : 'Phone'}) );

        $('#table').on( 'click', 'tr', function () {
            try {
                row_id = table.row( this ).data().id;
                editor.s.ajax.edit.url = '/api/merchants';
                editor.s.ajax.remove.url = '/api/merchants';
            }
            catch (e) {

            }
        } );

        var table = $('#table').DataTable({
            'responsive': true,
            "ajax": {
                "url": "/api/merchants",
                "type": "GET",
            },
            "columns": [
                {"data": "id"},
                {"data": "name"},
                {"data": "address"},
                {"data": "phone"},
                {"data": "email"}
            ],
            'bPaginate': false,
            'select': true,
            "bInfo": false,
            "bLengthChange" : false
        });

        editor = new $.fn.dataTable.Editor( {

            ajax: {
                create: {
                    type: 'POST',
                    url: '/api/merchants',
                    data: function(d){
                        d.name= $("#DTE_Field_name").val();
                        d.address= $("#DTE_Field_address").val();
                        d.phone= $("#DTE_Field_phone").val();
                        d.email= $("#DTE_Field_email").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        table.ajax.reload();
                        $.notify('New merchant added.', 'success');
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                edit: {
                    type: 'PATCH',
                    url:  '/api/merchants',
                    data: function(d){
                        d.id = row_id;
                        d.name= $("#DTE_Field_name").val();
                        d.address= $("#DTE_Field_address").val();
                        d.phone= $("#DTE_Field_phone").val();
                        d.email= $("#DTE_Field_email").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Merchant updated.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                remove: {
                    type: 'DELETE',
                    url:  '/api/merchants',
                    data: function(d){
                        d.id = row_id;
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Merchant has been trashed.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                }
            },
            table: "#table",
            'idSrc': 'id',
            fields: [ {
                label: "ID:",
                name: "id",
                type:  "readonly",
            }, {
                label: "Name:",
                name: "name"
            }, {
                label: "Address:",
                name: "address",
                type: "textarea"
            },{
                label: "Phone:",
                name: "phone",
                attr: {
                    "type": "number"
                }
            },{
                label: "Email:",
                name: "email"
            }
            ],
            i18n: {
                create: {
                    title:  "Add Merchant"
                },
                edit: {
                    title:  "Edit Merchant"
                },
                remove: {
                    title:  "Trash Merchant"
                }
            }
        } );

        new $.fn.dataTable.Buttons( table, [
            { extend: "create", className: 'btn btn-primary', editor: editor },
            { extend: "edit",  className: 'btn btn-default',  editor: editor },
            { extend: "remove", className: 'btn btn-danger', editor: editor,
                formMessage: function ( e, dt ) {
                    return 'Are you sure you want to trash the merchant?';
                }
            }
        ] );

        table.buttons().container()
            .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

    }
 else if (location.pathname == '/products') {

        $('.page-header').html('Products');
        $('.panel-heading').html('Add, Edit, Delete Products');

        $('thead tr').append( $('<th />', {text : 'ID'}) );
        $('thead tr').append( $('<th />', {text : 'Name'}) );

        $('#table').on( 'click', 'tr', function () {
            try {
                row_id = table.row( this ).data().id;
                editor.s.ajax.edit.url = '/api/products';
                editor.s.ajax.remove.url = '/api/products';
            }
            catch (e) {

            }
        } );

        var table = $('#table').DataTable({
            'responsive': true,
            "ajax": {
                "url": "/api/products",
                "type": "GET",
            },
            "columns": [
                {"data": "id"},
                {"data": "name"}
            ],
            'bPaginate': false,
            'select': true,
            "bInfo": false,
            "bLengthChange" : false
        });

        editor = new $.fn.dataTable.Editor( {

            ajax: {
                create: {
                    type: 'POST',
                    url: '/api/products',
                    data: function(d){
                        d.name= $("#DTE_Field_name").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        table.ajax.reload();
                        $.notify('New product added.', 'success');
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                edit: {
                    type: 'PATCH',
                    url:  '/api/products',
                    data: function(d){
                        d.id = row_id;
                        d.name= $("#DTE_Field_name").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Product updated.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                remove: {
                    type: 'DELETE',
                    url:  '/api/products',
                    data: function(d){
                        d.id = row_id;
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Product has been trashed.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                }
            },
            table: "#table",
            'idSrc': 'id',
            fields: [ {
                label: "ID:",
                name: "id",
                type:  "readonly",
            }, {
                label: "Name:",
                name: "name"
            }
            ],
            i18n: {
                create: {
                    title:  "Add Product"
                },
                edit: {
                    title:  "Edit Product"
                },
                remove: {
                    title:  "Trash Product"
                }
            }
        } );

        new $.fn.dataTable.Buttons( table, [
            { extend: "create", className: 'btn btn-primary', editor: editor },
            { extend: "edit",  className: 'btn btn-default',  editor: editor },
            { extend: "remove", className: 'btn btn-danger', editor: editor,
                formMessage: function ( e, dt ) {
                    return 'Are you sure you want to trash the employee?';
                }
            }
        ] );

        table.buttons().container()
            .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

    }
 else if (location.pathname == '/transactions') {

        $('.page-header').html('Transactions');
        $('.panel-heading').html('Add, Edit, Delete Transactions');

        $('thead tr').append( $('<th />', {text : 'ID'}) );
        $('thead tr').append( $('<th />', {text : 'Weight'}) );
        $('thead tr').append( $('<th />', {text : 'Purity'}) );
        $('thead tr').append( $('<th />', {text : 'Rate'}) );

        $('#table').on( 'click', 'tr', function () {
            try {
                row_id = table.row( this ).data().id;
                editor.s.ajax.edit.url = '/api/transactions';
                editor.s.ajax.remove.url = '/api/transactions';
            }
            catch (e) {

            }
        } );
        var table = $('#table').DataTable({
            'responsive': true,
            "ajax": {
                "url": "/api/transactions",
                "type": "GET",
            },
            "columns": [
                {"data": "id"},
                {"data": "weight"},
                {"data": "purity"},
                {"data": "rate.rate"}
            ],
            'bPaginate': false,
            'select': true,
            "bInfo": false,
            "bLengthChange" : false
        });

        editor = new $.fn.dataTable.Editor( {

            ajax: {
                create: {
                    type: 'POST',
                    url: '/api/transactions',
                    data: function(d){
                        d.weight= $("#DTE_Field_weight").val();
                        d.purity= $("#DTE_Field_purity").val();
                        d.rate_id= $("#DTE_Field_rate_id").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('New transaction added.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                edit: {
                    type: 'PATCH',
                    url:  '/api/transactions',
                    data: function(d){
                        d.id = row_id;
                        d.weight= $("#DTE_Field_weight").val();
                        d.purity= $("#DTE_Field_purity").val();
                        d.rate_id= $("#DTE_Field_rate_id").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Transaction updated.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                remove: {
                    type: 'DELETE',
                    url:  '/api/transactions',
                    data: function(d){
                        d.id = row_id;
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Transaction has been trashed.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                }
            },
            table: "#table",
            'idSrc': 'id',
            fields: [ {
                label: "ID:",
                name: "id",
                type:  "readonly"
            }, {
                label: "Weight:",
                name: "weight",
                attr: {
                    "type": "number"
                }
            }, {
                label: "Purity:",
                name: "purity",
                attr: {
                    "type": "number"
                }
            },
                {
                    label: "Rate:",
                    name: "rate_id",
                    type: "select"
                }
            ],
            i18n: {
                create: {
                    title:  "Add Transaction"
                },
                edit: {
                    title:  "Edit Transaction"
                },
                remove: {
                    title:  "Trash Transaction"
                }
            }
        } );

        $.ajax({
            url: '/api/rates',
            type: 'GET',
            data: {},
            success: function (response) {

                var rate_info = [];
                response = $.parseJSON(response);
                var data = response['data'];
                for (var i = 0; i < data.length; i++) {
                    rate_info.push({label: data[i]['id'] + ' - ' + data[i]['rate'] + '(' +data[i]['date'] +')', value: data[i]['id']});
                }
                editor.field('rate_id').update(rate_info);

            }, error: function () {
                $.notify('There was an error fetching rate data.');
            }
        });

        new $.fn.dataTable.Buttons( table, [
            { extend: "create", className: 'btn btn-primary', editor: editor },
            { extend: "edit",  className: 'btn btn-default',  editor: editor },
            { extend: "remove", className: 'btn btn-danger', editor: editor,
                formMessage: function ( e, dt ) {
                    return 'Are you sure you want to trash the transaction?';
                }
            }
        ] );

        table.buttons().container()
            .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

    }
 else if (location.pathname == '/stocks') {

        $('.page-header').html('Stock');
        $('.panel-heading').html('Add, Edit, Delete Stock');

        $('thead tr').append( $('<th />', {text : 'ID'}) );
        $('thead tr').append( $('<th />', {text : 'Product'}) );
        $('thead tr').append( $('<th />', {text : 'Merchant'}) );
        $('thead tr').append( $('<th />', {text : 'Weight'}) );
        $('thead tr').append( $('<th />', {text : 'Purity'}) );
        $('thead tr').append( $('<th />', {text : 'Date of purchase'}) );

        $('#table').on( 'click', 'tr', function () {
            try {
                row_id = table.row( this ).data().id;
                editor.s.ajax.edit.url = '/api/stocks';
                editor.s.ajax.remove.url = '/api/stocks';
            }
            catch (e) {

            }
        } );
        var table = $('#table').DataTable({
            'responsive': true,
            "ajax": {
                "url": "/api/stocks",
                "type": "GET",
            },
            "columns": [
                {"data": "id"},
                {"data": "product.name"},
                {"data": "merchant.name"},
                {"data": "weight"},
                {"data": "purity"},
                {"data": "dop"}
            ],
            'bPaginate': false,
            'select': true,
            "bInfo": false,
            "bLengthChange" : false,
        });

        editor = new $.fn.dataTable.Editor( {

            ajax: {
                create: {
                    type: 'POST',
                    url: '/api/stocks',
                    data: function(d){
                        d.product_id = $("#DTE_Field_product_id").val();
                        d.merchant_id= $("#DTE_Field_merchant_id").val();
                        d.weight= $("#DTE_Field_weight").val();
                        d.purity= $("#DTE_Field_purity").val();
                        d.dop= $("#DTE_Field_dop").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('New Stock added.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                edit: {
                    type: 'PATCH',
                    url:  '/api/stocks',
                    data: function(d){
                        d.id = row_id;
                        d.product_id = $("#DTE_Field_product_id").val();
                        d.merchant_id= $("#DTE_Field_merchant_id").val();
                        d.weight= $("#DTE_Field_weight").val();
                        d.purity= $("#DTE_Field_purity").val();
                        d.dop= $("#DTE_Field_dop").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Stock updated.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                remove: {
                    type: 'DELETE',
                    url:  '/api/stocks',
                    data: function(d){
                        d.id = row_id;
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Stock has been trashed.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                }
            },
            table: "#table",
            'idSrc': 'id',
            fields: [ {
                label: "ID:",
                name: "id",
                type:  "readonly"
            }, {
                label: "Product:",
                name: "product_id",
                type: "select"
            }, {
                label: "Merchant:",
                name: "merchant_id",
                type: "select"
            }, {
                label: "Weight:",
                name: "weight",
                attr: {
                    "type": "number"
                }
            }, {
                label: "Purity:",
                name: "purity",
                attr: {
                    "type": "number"
                }
            },
                {
                    label: "Date of Purchase:",
                    name: "dop",
                    type: "text",
                    attr: {
                        "placeholder": "Y-m-d H:i:s"
                    }
                }
            ],
            i18n: {
                create: {
                    title:  "Add Stock"
                },
                edit: {
                    title:  "Edit Stock"
                },
                remove: {
                    title:  "Trash Stock"
                }
            }
        } );

        $.ajax({
            url: '/api/stockInfo',
            type: 'GET',
            data: {},
            success: function (response) {
                response = $.parseJSON(response);
                var stock_product = [];
                var stock_merchant = [];
                var products = response['data']['products'];
                var merchants = response['data']['merchants'];

                for (var i = 0; i < products.length; i++) {
                    stock_product.push({label: products[i]['id'] + ' - ' + products[i]['name'], value: products[i]['id']});
                }

                for (var i = 0; i < merchants.length; i++) {
                    stock_merchant.push({label: merchants[i]['id'] + ' - ' + merchants[i]['name'], value: merchants[i]['id']});
                }

                editor.field('product_id').update(stock_product);
                editor.field('merchant_id').update(stock_merchant);

            }, error: function () {
                $.notify('There was an error fetching product & merchant data.');
            }
        });

        new $.fn.dataTable.Buttons( table, [
            { extend: "create", className: 'btn btn-primary', editor: editor },
            { extend: "edit",  className: 'btn btn-default',  editor: editor },
            { extend: "remove", className: 'btn btn-danger', editor: editor,
                formMessage: function ( e, dt ) {
                    return 'Are you sure you want to trash the stock?';
                }
            }
        ] );

        table.buttons().container()
            .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

    }
    else if (location.pathname == '/items_sold') {

        $('.page-header').html('Items sold');
        $('.panel-heading').html('Add, Edit, Delete Items Sold');

        $('thead tr').append( $('<th />', {text : 'ID'}) );
        $('thead tr').append( $('<th />', {text : 'Stock'}) );
        $('thead tr').append( $('<th />', {text : 'Customer'}) );
        $('thead tr').append( $('<th />', {text : 'Employee'}) );
        $('thead tr').append( $('<th />', {text : 'Transaction'}) );
        $('thead tr').append( $('<th />', {text : 'Price'}) );
        $('thead tr').append( $('<th />', {text : 'Date of selling'}) );

        $('#table').on( 'click', 'tr', function () {
            try {
                row_id = table.row( this ).data().id;
                editor.s.ajax.edit.url = '/api/items_sold';
                editor.s.ajax.remove.url = '/api/items_sold';
            }
            catch (e) {

            }
        } );
        var table = $('#table').DataTable({
            'responsive': true,
            "ajax": {
                "url": "/api/items_sold",
                "type": "GET",
            },
            "columns": [
                {"data": "id"},
                {"data": "stock.id"},
                {"data": "customer.name"},
                {"data": "employee.name"},
                {"data": "transaction.id"},
                {"data": "price"},
                {"data": "dos"}
            ],
            'bPaginate': false,
            'select': true,
            "bInfo": false,
            "bLengthChange" : false,
        });

        editor = new $.fn.dataTable.Editor( {

            ajax: {
                create: {
                    type: 'POST',
                    url: '/api/items_sold',
                    data: function(d){
                        d.stock_id = $("#DTE_Field_stock_id").val();
                        d.customer_id= $("#DTE_Field_customer_id").val();
                        d.employee_id = $("#DTE_Field_employee_id").val();
                        d.transaction_id= $("#DTE_Field_transaction_id").val();
                        d.price= $("#DTE_Field_price").val();
                        d.dos= $("#DTE_Field_dos").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('New Stock added.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                edit: {
                    type: 'PATCH',
                    url:  '/api/items_sold',
                    data: function(d){
                        d.id = row_id;
                        d.stock_id = $("#DTE_Field_stock_id").val();
                        d.customer_id= $("#DTE_Field_customer_id").val();
                        d.employee_id = $("#DTE_Field_employee_id").val();
                        d.transaction_id= $("#DTE_Field_transaction_id").val();
                        d.price= $("#DTE_Field_price").val();
                        d.dos= $("#DTE_Field_dos").val();
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Stock updated.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                },
                remove: {
                    type: 'DELETE',
                    url:  '/api/items_sold',
                    data: function(d){
                        d.id = row_id;
                        delete d.data;
                        delete d.action;
                    },
                    success: function () {
                        $.notify('Stock has been trashed.', 'success');
                        table.ajax.reload();
                    },
                    error: function (response) {
                        var json = $.parseJSON(response.responseText);
                        for (var key in json) {
                            $.notify(json[key]);
                        }
                    }
                }
            },
            table: "#table",
            'idSrc': 'id',
            fields: [ {
                label: "ID:",
                name: "id",
                type:  "readonly"
            }, {
                label: "Stock:",
                name: "stock_id",
                type: "select"
            }, {
                label: "Customer:",
                name: "customer_id",
                type: "select"
            }, {
                label: "Employee:",
                name: "employee_id",
                type: "select"
            }, {
                label: "Transaction:",
                name: "transaction_id",
                type: "select"
            },{
                label: "Price:",
                name: "price",
                attr: {
                    "type": "number"
                }
            },
                {
                    label: "Date of Selling:",
                    name: "dos",
                    type: "text",
                    attr: {
                        "placeholder": "Y-m-d H:i:s"
                    }
                }
            ],
            i18n: {
                create: {
                    title:  "Add Item Sold"
                },
                edit: {
                    title:  "Edit Item Sold"
                },
                remove: {
                    title:  "Trash Item Sold"
                }
            }
        } );

        $.ajax({
            url: '/api/items_sold_info',
            type: 'GET',
            data: {},
            success: function (response) {
                response = $.parseJSON(response);
                var solditem_stock = [];
                var solditem_customer = [];
                var solditem_employee = [];
                var solditem_transaction = [];
                var stocks = response['data']['stocks'];
                var customers = response['data']['customers'];
                var employees = response['data']['employees'];
                var transactions = response['data']['transactions'];

                for (var i = 0; i < stocks.length; i++) {
                    solditem_stock.push({label: stocks[i]['id'] + ' - Product ID: ' + stocks[i]['product_id'], value: stocks[i]['id']});
                }

                for (var i = 0; i < customers.length; i++) {
                    solditem_customer.push({label: customers[i]['id'] + ' - ' + customers[i]['name'], value: customers[i]['id']});
                }

                for (var i = 0; i < employees.length; i++) {
                    solditem_employee.push({label: employees[i]['id'] + ' - ' + employees[i]['name'], value: employees[i]['id']});
                }

                for (var i = 0; i < transactions.length; i++) {
                    solditem_transaction.push({label: transactions[i]['id'] + ' - Weight: ' + transactions[i]['weight'] + ' - Purity: ' + transactions[i]['purity'], value: transactions[i]['id']});
                }
                editor.field('stock_id').update(solditem_stock);
                editor.field('customer_id').update(solditem_customer);
                editor.field('employee_id').update(solditem_employee);
                editor.field('transaction_id').update(solditem_transaction);

            }, error: function () {
                $.notify('There was an error fetching additional data.');
            }
        });

        new $.fn.dataTable.Buttons( table, [
            { extend: "create", className: 'btn btn-primary', editor: editor },
            { extend: "edit",  className: 'btn btn-default',  editor: editor },
            { extend: "remove", className: 'btn btn-danger', editor: editor,
                formMessage: function ( e, dt ) {
                    return 'Are you sure you want to trash the sold item?';
                }
            }
        ] );

        table.buttons().container()
            .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

    }
    else if (location.pathname == '/rates') {

        $('.page-header').html('Rates');
        $('.panel-heading').html('Datewise rates');

        $('thead tr').append( $('<th />', {text : 'ID'}) );
        $('thead tr').append( $('<th />', {text : 'Rate'}) );
        $('thead tr').append( $('<th />', {text : 'Date'}) );

        var table = $('#table').DataTable({
            'responsive': true,
            "ajax": {
                "url": "/api/rates",
                "type": "GET",
            },
            "columns": [
                {"data": "id"},
                {"data": "rate"},
                {"data": "date"}
            ],
            "order": [[ 2, "asc" ]],
            'bPaginate': false,
            'select': true,
            "bInfo": false,
            "bLengthChange" : false
        });
    }
    else if (location.pathname == '/') {
        function rates(){
            $.ajax({
                url: 'http://www.apilayer.net/api/live?access_key=YOUR_ACCESS_KEY_HERE&format=1',
                type: 'GET',
                success: function (response) {
                    var usd_inr = response['quotes']['USDINR'];
                    var usd_xau = response['quotes']['USDXAU'];
                    var usd_xag = response['quotes']['USDXAG'];
                    var inr_xau = (10 / (usd_xau * 31.1035)) * usd_inr;
                    var inr_xag = ((10 / (usd_xag * 31.1035)) * usd_inr)*100;
                    $("#usd").html('<strong>' +  usd_inr.toPrecision(4) + '</strong>');
                    $("#au").html('<strong>' + inr_xau.toPrecision(7) + '</strong>');
                    $("#ag").html('<strong>' + inr_xag.toPrecision(7) + '</strong>');

                }, error: function () {
                    $.notify('There was an error fetching market data.');
                }
            });
        }
        $.ajax({
            url: '/api/tables',
            type: 'GET',
            success: function (response) {
                $("#customers").text(response['data']['customers']);
                $("#employees").text(response['data']['employees']);
                $("#transactions").text(response['data']['transactions']);
                $("#sold-items").text(response['data']['items_sold']);

            }, error: function () {
                $.notify('There was an error fetching data.');
            }
        });
        $.ajax({
            url: '/api/transactions',
            type: 'GET',
            data: {
                latest: true
            },
            success: function (response) {
                response = $.parseJSON(response);
                var transactions = response['data'];
                $.each(transactions, function (i, transaction) {
                    $(".latest-transactions").append("<tr><td>"+transaction['id']+"</td><td>"+transaction['weight']+"</td><td>"+transaction['purity']+"</td><td>"+transaction['rate']['rate']+"</td></tr>");
                });
            }, error: function () {
                $.notify('There was an error fetching data.');
            }
        });
        rates();
        setInterval(function(){rates();}, 120000);

    }
    else if (location.pathname == '/profile') {
        var userDetails;
        var uid = $("input[name=employee]").val();
        $.ajax({
            url: '/api/users',
            type: 'POST',
            async: false,
            data: {
                employee_id: uid
            },
            success: function (response) {
                userDetails = response;
            }, error: function () {
                $.notify('There was an error fetching user data.');
            }
        });

        $.ajax({
            url: '/api/employees',
            type: 'POST',
            data: {
                employee_id: uid
            },
            success: function (response) {
                $('input[name=name]').val(response['data']['name']);
                $('input[name=phone]').val(response['data']['phone']);
                $('textarea#address').val(response['data']['address']);
                $('input[name=doj]').val(response['data']['doj']);
                $('input[name=gender][value='+response['data']['gender']+']').attr("checked",true);
            }, error: function () {
                $.notify('There was an error fetching user data.');
            }
        });
        $("input[name=employee]").val(uid);
        $("input[name=email]").val(userDetails['data']['email']);
    }
    $(".form-signin").submit(function (e) {
        e.preventDefault();
    });
    $('#submit-login-form').click(function () {
        var address = $('.form-signin').attr('action');
        var method = $('.form-signin').attr('method');
        var mail = $("input[name= email]").val();
        var pass = $("input[name=password]").val();
        $("input[type=password]").val("");
        $.ajax({
            url: address,
            type: method,
            data: {
                email: mail,
                password: pass,
            },
            success: function () {
                location.reload();
            },
            error: function (response) {
                var json = $.parseJSON(response.responseText);
                for (var key in json) {
                    $.notify(json[key]);
                }
            }
        });
    });


    $("#update_user").submit(function (e) {
        e.preventDefault();
    });
    $('#user_submit').click(function () {
        var uid = $("input[name=employee]").val();
        var mail = $("input[name=email]").val();
        var pass = $("input[name=password]").val();
        var pass_confirm = $("input[name=password_confirmation]").val();
        $("input[type=password]").val("");
        $.ajax({
            url: '/api/users',
            type: 'PATCH',
            data: {
                profile: true,
                employee_id: uid,
                email: mail,
                password: pass,
                password_confirmation: pass_confirm
            },
            success: function () {

                $.notify("Credentials saved successfully.", "success");
            },
            error: function (response) {
                var json = $.parseJSON(response.responseText);
                for (var key in json) {
                    $.notify(json[key]);
                }
            }
        });
    });
    $("#update_employee").submit(function (e) {
        e.preventDefault();
    });
    $('#employee_submit').click(function () {
        var uid = $("input[name=employee]").val();
        var employee_name = $('input[name=name]').val();
        var employee_phone = $('input[name=phone]').val();
        var employee_address = $('textarea#address').val();
        var employee_doj = $('input[name=doj]').val();
        var employee_gender = $('input[name=gender]:checked').val();
        $.ajax({
            url: '/api/employees',
            type: 'PATCH',
            data: {
                id: uid,
                name: employee_name,
                phone: employee_phone,
                address: employee_address,
                doj: employee_doj,
                gender: employee_gender
            },
            success: function () {
                $.notify("Information saved successfully.", "success");
            },
            error: function (response) {
                var json = $.parseJSON(response.responseText);
                for (var key in json) {
                    $.notify(json[key]);
                }
            }
        });
    });
	$('.disabled').css('pointer-events', 'initial');
	$('[data-toggle="tooltip"]').tooltip();   
	$('.buttons-edit').hover(function(){
		if($(this).hasClass('disabled')){
			$(this).attr("data-toggle", "tooltip");
			$(this).attr("title", "Select a record");
		}else{
			$(this).attr("data-toggle", "");
			$(this).attr("title", "");
		}
    });
	$('.buttons-remove').hover(function(){
		if($(this).hasClass('disabled')){
			$(this).attr("data-toggle", "tooltip");
			$(this).attr("title", "Select a record");		
		}else{
			$(this).attr("data-toggle", "");
			$(this).attr("title", "");
		}
    });
});
