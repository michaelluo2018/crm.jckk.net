
$(window).on('load', function() {

	// Row Toggler
	// -----------------------------------------------------------------
	$('#demo-foo-row-toggler').footable();

	// Accordion
	// -----------------------------------------------------------------
	$('#demo-foo-accordion').footable().on('footable_row_expanded', function(e) {
		$('#demo-foo-accordion tbody tr.footable-detail-show').not(e.row).each(function() {
			$('#demo-foo-accordion').data('footable').toggleDetail(this);
		});
	});

	// Pagination
	// -----------------------------------------------------------------
	$('#demo-foo-pagination').footable();
	$('#demo-show-entries').change(function (e) {
		e.preventDefault();
		var pageSize = $(this).val();
		$('#demo-foo-pagination').data('page-size', pageSize);
		$('#demo-foo-pagination').trigger('footable_initialized');
	});

	// Filtering
	// -----------------------------------------------------------------
	var filtering = $('#demo-foo-filtering');
	filtering.footable().on('footable_filtering', function (e) {
		var selected = $('#demo-foo-filter-status').find(':selected').val();
		e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
		e.clear = !e.filter;
	});

	// Filter status
	$('#demo-foo-filter-status').change(function (e) {
		e.preventDefault();
		filtering.trigger('footable_filter', {filter: $(this).val()});
	});

	// Search input
	$('#demo-foo-search').on('input', function (e) {
		e.preventDefault();
		filtering.trigger('footable_filter', {filter: $(this).val()});
	});


	

	// Search input
	$('#demo-input-search2').on('input', function (e) {
		e.preventDefault();
		addrow.trigger('footable_filter', {filter: $(this).val()});
	});
	
	// Add & Remove Row
	var addrow = $('#demo-foo-addrow');
	addrow.footable().on('click', '.delete-row-btn', function() {

		//get the footable object
		var footable = addrow.data('footable');

		//get the row we are wanting to delete
		var row = $(this).parents('tr:first');

		//delete the row
		footable.removeRow(row);
	});
    var addrow = $('#demo-foo-addrow2');
	addrow.footable().on('click', '.delete-row-btn', function() {

		//get the footable object
		var footable = addrow.data('footable');

		//get the row we are wanting to delete
		var row = $(this).parents('tr:first');

		//delete the row
		footable.removeRow(row);
	});
	// Add Row Button
	$('#demo-btn-addrow').click(function() {

		//get the footable object
		var footable = addrow.data('footable');
		
		//build up the row we are wanting to add
		var newRow = '<tr>'                                          
                     +'<td><input type="text" id="department_name" name="department_name[]" class="form-control" placeholder="" value=""></td>'
                     +'<td><input type="text" id="listorder" name="listorder[]" class="form-control" placeholder="" value=""></td>   '
                     +'<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="删除"><i class="ti-close" aria-hidden="true"></i></button>'
					 +'</td></tr>';

		//add it
		footable.appendRow(newRow);
	});
	
	
	var addrow_department = $('#demo-foo-addrow-department');
	// Add Row Button
	$('#demo-btn-addrow-department').click(function() {
		
		//get the footable object
		var footable = addrow_department.data('footable');
		
		//build up the row we are wanting to add
		var newRow = '<tr>'
                     +'<td><input type="text" id="department_name" name="department_name[]" class="form-control" placeholder="" value="" required></td>'
                     +'<td><input type="text" id="listorder" name="listorder[]" class="form-control" placeholder="" value="" required></td>'
                     +'<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="删除"><i class="ti-close" aria-hidden="true"></i></button></td></tr>';

		//add it
		footable.appendRow(newRow);
	});



    var addrow_menu = $('#demo-foo-addrow-menu');
    // Add Row Button
    $('#demo-btn-addrow-menu').click(function() {
        //get the footable object
        var footable = addrow_menu.data('footable');

        //build up the row we are wanting to add
        var newRow = '<tr>'
            +'<td><input type="text" id="menu_name" name="title[]" class="form-control" placeholder="" value="" required></td>'
            +'<td><input type="text" id="menu_icon" name="icon[]" class="form-control" placeholder="" value="" required><br/><small>预留样式：mdi-laptop-windows,mdi-gauge,mdi-account-circle</small></td>'
            +'<td><input type="text" id="menu_url" name="url[]" class="form-control" placeholder="" value="" ></td>'
            +'<td><input type="text" id="menu_order" name="menu_order[]" class="form-control" placeholder="" value="" required></td>'
            +'<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="删除"><i class="ti-close" aria-hidden="true"></i></button></td></tr>';

        //add it
        footable.appendRow(newRow);
    });

    addrow_menu.footable().on('click', '.delete-row-btn', function() {

        //get the footable object
        var footable = addrow_menu.data('footable');

        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');

        //delete the row
        footable.removeRow(row);
    });
















    addrow_department.footable().on('click', '.delete-row-btn', function() {

		//get the footable object
		var footable = addrow_department.data('footable');

		//get the row we are wanting to delete
		var row = $(this).parents('tr:first');

		//delete the row
		footable.removeRow(row);
	});






});
