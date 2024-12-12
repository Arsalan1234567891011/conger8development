<?php
    
    $urole = get_user_role(session()->user_id);
    
    if($urole == 'churchadmin'){
    
      $att_link = get_att_link();
      //$att_link = get_att_link_church();
    }
    
    if($urole == 'user'){
    
      $att_link = get_sub_user_att_link();
      //$att_link = get_att_link_church();
    
    }
    
    
    if($urole == 'superadmin'){
    
      $att_link = "";
      //$att_link = get_att_link_church();
    
    }

?>
<style>
  .table {
    border: none !important;
  }

  .table th {
    background-color: var(--contact-bg);
    color: var(--contact-name);
    border: none !important;
  }

  .btn-refresh {
    border-radius: 24px;
    background: var(--button-bg);
    border: 1px solid var(--button-border);
    display: flex;
    width: 195px;
    height: 41px;
    padding: 11px 15px;
    justify-content: center;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
    color: var(--button-text);
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .btn-csv {
    border-radius: 24px;
    background: var(--button-bg);
    border: 1px solid var(--button-border);
    display: flex;
    width: 161px;
    height: 41px;
    padding: 11px 15px;
    justify-content: center;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
    color: var(--button-text);
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
  }

  .btn-all:hover {
    color: var(--button-text);
  }

  .btn-refresh:hover {
    color: var(--button-text);
  }

  .table th,
  .table td {
    vertical-align: middle;
    border: none !important;
  }

  .table td label {
    color: var(--contact-name);
    font-weight: bold;
  }

  .table td a {
    color: var(--contact-text);
  }

  .table td.cont {
    color: var(--contact-text);
  }

  .table .btn-link {
    padding: 0;
  }

  .status-active {
    color: #1c9565;
  }

  .status-inactive {
    color: #951c1c;
  }

  /* Custom checkbox styling */
  /* Custom checkbox styling */
  .form-check-input {
    position: absolute;
    left: -9999px;
    /* Hide default checkbox */
  }

  .form-check-label {
    display: inline-block;
    width: 15px;
    height: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    background-color: #fff;
    /* Default background color */
    cursor: pointer;
    position: relative;
  }

  .form-check-label::after {
    content: "\2713";
    /* Unicode checkmark character */
    color: transparent;
    /* Transparent by default */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 12px;
  }

  .form-check-input:checked+.form-check-label {
    background-color: #e61515;
    /* Background color when checkbox is checked */
    border-color: #e61515;
    /* Border color when checkbox is checked */
  }

  .form-check-input:checked+.form-check-label::after {
    color: #fff;
    /* Color of checkmark when checkbox is checked */
  }

  /* delete model */
  /* The Modal (background) */
  .del-modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 48%;
    top: 0;
    overflow: hidden;
  }

  /* Modal Content */
  .del-modal .modal-content {
    margin-top: 35%;
    width: 277px;
    height: 205px;
    flex-shrink: 0;
    border-radius: 8px;
    background: var(--bg-color);
    box-shadow: 0px 10px 25px 0px var(--bg-color);
  }

  .delete-btn {
    width: 114px;
    height: 33px;
    border-radius: 6px;
    background: #FF003D;
    color: #FFF;
    text-align: center;
    border: none;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
  }

  .cancel-btn {
    border: none;
    width: 114px;
    height: 33px;
    border-radius: 6px;
    cursor: pointer;
    background: var(--button-bg);
    color: var(--button-text);
    border: 1px solid var(--button-border);
    text-align: center;
    font-size: 13px;
    font-weight: 600;
  }
  .dataTables_filter {
    display: none;
  }
</style>

<div id="main-content">
    <div id="delete-modal" class="modal del-modal">
      <div class="modal-content">
        <svg style="margin:auto" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57"
          fill="none">
          <circle cx="28.5" cy="28.5" r="28.5" fill="#FFF8F8" />
          <path
            d="M21.6233 37.3019C21.6233 38.6812 22.6547 39.8095 23.9154 39.8095H33.0837C34.3444 39.8095 35.3757 38.6812 35.3757 37.3019V22.8452H21.6233V37.3019ZM37.0948 19.0754H32.7972L31.3583 17.1904H25.6409L24.2019 19.0754H19.9043V20.9603H37.0948V19.0754Z"
            fill="#FF003D" />
        </svg>
        <p style="width: 213px; color: var(--card-text-color);margin: auto;margin-top: 0px;
          text-align: center; 
          font-size: 11px;
          font-weight: 600;">
          Are you sure you want to permanently delete these contacts?</p>
        <div class="button-container m-auto">
          <button id="cancel-delete" class="cancel-btn">Cancel</button>
          <button id="confirm-delete" class="delete-btn">Delete</button>
        </div>
      </div>
    </div>

    <div id="delete-success" class="modal del-modal">
      <div class="modal-content">
        <svg style="margin: auto;" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57"
          fill="none">
          <circle cx="28.5" cy="28.5" r="28.5" fill="#FFF8F8" />
          <path
            d="M29 16C22.383 16 17 21.383 17 28C17 34.617 22.383 40 29 40C35.617 40 41 34.617 41 28H38.3C38.3 33.128 34.128 37.3 29 37.3C23.872 37.3 19.7 33.128 19.7 28C19.7 22.872 23.872 18.7 29 18.7V16ZM36.4 18.583L28.895 27.954L25.388 25.08L23.386 27.516L28.127 31.404C28.2881 31.5369 28.474 31.6363 28.6739 31.6966C28.8738 31.7569 29.0837 31.7767 29.2913 31.755C29.499 31.7334 29.7003 31.6705 29.8834 31.5703C30.0665 31.47 30.2279 31.3343 30.358 31.171L38.862 20.554L36.4 18.583Z"
            fill="#FF003D" />
        </svg>
        <h3 style="color:var(--card-text-color);
        text-align: center;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;">Contact Deleted!</h3>
        <p style="width: 213px; color: var(--card-text-color);margin: auto;margin-top: 0px;
          text-align: center; 
          font-size: 11px;
          font-weight: 600;">
          The contact has been removed successfully!</p>
        <div class="button-container m-auto">
          <button id="del-modal-close" class="delete-btn">Close</button>
        </div>
      </div>
    </div>
    <div class="col-xl-12" id="bg">

      <div class="card-cont" style="
              background-color: transparent;
              border: none;
              color: var(--card-text-color);
              transition: background-color 0.3s, color 0.3s;
            ">
        <div  class="card-header d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between" style="border: 0 !important;">
          <h5 class="mb-3 mb-xl-0" style="font-weight: bold;">Recent Contacts</h5>
          <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center" style="gap: 20px;">
            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center" style="gap: 20px;">
            <button class="btn btn-refresh btn-sm" id="refresh-contacts">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                <path
                  d="M12.6769 0.5C12.2219 0.5 11.8539 0.845072 11.8539 1.26995V3.06524C10.926 2.01406 9.85675 0.5 6.91388 0.5C3.37787 0.5 0.5 3.19141 0.5 6.5C0.5 9.80859 3.37787 12.5 6.91388 12.5C8.26556 12.5013 9.58306 12.1027 10.6779 11.3611C11.7727 10.6195 12.5887 9.57301 13.0092 8.37129C13.0437 8.27347 13.0571 8.17027 13.0489 8.06758C13.0407 7.96489 13.0109 7.86472 12.9613 7.7728C12.9117 7.68087 12.8432 7.59898 12.7598 7.5318C12.6764 7.46463 12.5796 7.41349 12.475 7.3813C12.3705 7.34911 12.2601 7.3365 12.1504 7.3442C12.0406 7.35189 11.9335 7.37973 11.8353 7.42614C11.6368 7.51986 11.4862 7.6835 11.4167 7.88105C11.1063 8.76896 10.5035 9.54225 9.6947 10.0903C8.8859 10.6383 7.91253 10.9329 6.91388 10.932C4.30087 10.932 2.17537 8.94363 2.17537 6.49924C2.17537 4.05485 4.30087 2.07563 6.91388 2.07563C8.76394 2.07563 9.79175 3.15265 10.6302 4.28211H8.56081C8.34252 4.28211 8.13317 4.36323 7.97882 4.50763C7.82446 4.65202 7.73775 4.84786 7.73775 5.05206C7.73775 5.25627 7.82446 5.45211 7.97882 5.5965C8.13317 5.7409 8.34252 5.82201 8.56081 5.82201H12.6769C12.785 5.82226 12.892 5.80257 12.9919 5.76406C13.0917 5.72555 13.1825 5.66898 13.259 5.5976C13.3354 5.52621 13.3961 5.44141 13.4374 5.34806C13.4788 5.25471 13.5001 5.15464 13.5 5.05358V1.26995C13.4999 1.06578 13.4131 0.869997 13.2588 0.725625C13.1045 0.581253 12.8952 0.500101 12.6769 0.5Z"
                  fill="var(--button-text)" />
              </svg>
              Refresh Contacts
            </button>
            <div class="dropdown">
              <button class="btn btn-refresh btn-sm" style="width: 160px !important;" type="button"
                data-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 15 19" fill="none">
                  <path
                    d="M1.45363 18.664L0.765625 17.95L4.21562 14.5H1.23363V13.5H5.90263V18.17H4.90263V15.213L1.45363 18.664ZM8.28862 18V17H13.9996V5H9.99963V1H1.99963V11.116H0.999625V0H10.4996L14.9996 4.5V18H8.28862Z"
                    fill="var(--button-text)" />
                </svg>
                Export As
                <svg style="margin-left: auto;" xmlns="http://www.w3.org/2000/svg" width="9" height="6"
                  viewBox="0 0 9 6" fill="none">
                  <path style="stroke: var(--button-text);" stroke="currentColor" d="M1 1L4.5 5L8 1"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>
              <div class="dropdown-menu"
                style="width: 160px !important;padding: auto;border: 0 !important;font-size: 13px;">
                <button style="color: var(--text-color);;" class="dropdown-item" type="button">Copy</button>
                <button style="color: var(--text-color);;" class="dropdown-item" type="button">Excel</button>
                <button style="color: var(--text-color);;" class="dropdown-item" type="button">Pdf</button>
              </div>
            </div>
          </div>
            <div class="dropdown">
              <button class="btn btn-refresh btn-sm"
                style="width: 140px !important;background-color: #FF003D;color: #fff;" type="button"
                data-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M12 17.5C13.4587 17.5 14.8576 16.9205 15.8891 15.8891C16.9205 14.8576 17.5 13.4587 17.5 12M12 17.5C10.5413 17.5 9.14236 16.9205 8.11091 15.8891C7.07946 14.8576 6.5 13.4587 6.5 12M12 17.5V23M17.5 12C17.5 10.5413 16.9205 9.14236 15.8891 8.11091C14.8576 7.07946 13.4587 6.5 12 6.5M17.5 12H23M12 6.5C10.5413 6.5 9.14236 7.07946 8.11091 8.11091C7.07946 9.14236 6.5 10.5413 6.5 12M12 6.5V1M6.5 12H1M4.438 4.438L8.563 8.563M15.437 15.437L19.563 19.563M19.563 4.438L15.438 8.563M8.562 15.437L4.438 19.563"
                    stroke="#fff" stroke-width="2" />
                </svg>
                Actions
                <svg style="margin-left: auto;" xmlns="http://www.w3.org/2000/svg" width="9" height="6"
                  viewBox="0 0 9 6" fill="none">
                  <path style="stroke: #fff;" stroke="currentColor" d="M1 1L4.5 5L8 1" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>
              <div class="dropdown-menu"
                style="width: 140px !important;padding: auto;border: 0 !important;font-size: 12px;">
                <a  href="<?php echo base_url() ?>addcontacts" style="color: var(--text-color);" class="dropdown-item" type="button">Add
                  Contacts</a>
                <a href="<?php echo base_url() ?>import_contact" style="color: var(--text-color);" class="dropdown-item" type="button">Import
                  Contacts</a>
                <a href="<?php echo base_url() ?>/addexternalcontact?id=" style="color: var(--text-color);" class="dropdown-item" type="button">Add Contacts <br>
                  Via External Links</a>
              </div>
            </div>
          </div>
        </div>

        <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between m-3 w-100" style="justify-content: space-between !important;gap: 20px;">
          <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center m-0 m-xl-3" style="gap: 20px;">
          <div id="selectStatus">
            <select id="status">
              <option value="">Select Status</option>
              <option value="active">Active</option>
			   <option value="inactive">Inactive</option>
            </select>
          </div>
          <div id="selectType">
           <select id="type">
              <option value="">Select Type</option>
              <option value="Member">Member</option>
              <option value="Visitor">Visitor</option>
              <option value="Non-member">Non-member</option>
            </select>
          </div>
        </div>
          <div class="input-group position-relative">
            <div class="position-absolute" style="z-index: 100;border: none !important;top: 0px;left: -2px;">
              <span class="input-group-text" style="background-color: transparent;border: none !important;">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                    <path d="M11.4596 17.1876C14.6238 17.1876 17.1888 14.6225 17.1888 11.4584C17.1888 8.29428 14.6238 5.72925 11.4596 5.72925C8.2955 5.72925 5.73047 8.29428 5.73047 11.4584C5.73047 14.6225 8.2955 17.1876 11.4596 17.1876Z" stroke="var(--button-text)"/>
                    <path d="M15.625 15.625L19.7917 19.7917" stroke="var(--button-text)" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
              </span>
            </div>
            <input id="search" type="search" class="form-control" style="padding-left: 35px !important;max-width: 220px !important;" placeholder="Search" aria-label="Search">
          </div>
        </div>

        <div class="table-responsive">
          <table id="contact-data" class="table text-nowrap">
            <thead>
              <tr>
                <th scope="col">
                  <div class="form-check">
                    <input class="form-check-input cont-checkbox" type="checkbox" id="select-all">
                    <label class="form-check-label" for="select-all"></label>
                  </div>
                </th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="contacts-table-body2">
              <!-- Rows will be inserted here by JavaScript -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



<script>
	document.getElementById("refresh-contacts").addEventListener("click", loadContacts);
	document.getElementById("select-all").addEventListener("change", function () {
		const checkboxes = document.querySelectorAll(
			'#contacts-table-body2 input[type="checkbox"]'
		);
		checkboxes.forEach((checkbox) => (checkbox.checked = this.checked));
		updateDeleteIcons();
	});
	function loadContacts() {
		load_contacts_table(status, type);
	}
	function isChecked(contactId) {
		const checkbox = document.querySelector(`#contacts-table-body2 input[type="checkbox"][data-id="${contactId}"]`);
		return checkbox && checkbox.checked;
	}
	function updateDeleteIcons() {
		const checkboxes = document.querySelectorAll('#contacts-table-body2 input[type="checkbox"]');
		checkboxes.forEach((checkbox) => {
			const contactId = checkbox.getAttribute("data-id");
			const deleteIcon = document.getElementById(`delete-icon-${contactId}`);
			if (checkbox.checked) {
				deleteIcon.setAttribute("fill", "red");
			} else {
				deleteIcon.setAttribute("fill", "#9F9DA8");
			}
		});
	}
	document.getElementById("contacts-table-body2").addEventListener("click", function (event) {
		if (event.target.classList.contains("delete-contact")) {
			const contactId = event.target.getAttribute("data-id");
			if (isChecked(contactId)) {
				showModal(contactId);
			} else {
				alert("Please select the checkbox to delete the contact.");
			}
		}
	});
	let contactToDelete = null;
	function showModal(contactId) {
		contactToDelete = contactId;
		const modal = document.getElementById("delete-modal");
		modal.style.display = "block";
		applyBlur(); // Apply blur effect
	}
	document.getElementById("cancel-delete").addEventListener("click", function () {
		contactToDelete = null;
		removeBlur();
		closeModal("delete-modal");
	});
	// Close modals on window click
	window.addEventListener("click", function (event) {
		const successModal = document.getElementById("delete-success");
		const deleteModal = document.getElementById("delete-modal");
		if (event.target === successModal || event.target === deleteModal) {
			closeModal(event.target.id);
		}
	});
	document.getElementById("del-modal-close").addEventListener("click", function () {
		closeModal("delete-success");
		removeBlur();
	});
	function closeModal(modalId) {
		const modal = document.getElementById(modalId);
		modal.style.display = "none";
		// Check if any other modals are open before removing blur
		const isAnyModalOpen = document.getElementById("delete-modal").style.display === "block" ||
			document.getElementById("delete-success").style.display === "block";

	}
	function applyBlur() {
		document.getElementById("bg").classList.add("blur"); // Add blur class to main-content
	}
	function removeBlur() {
		document.getElementById("bg").classList.remove("blur"); // Remove blur class from main-content
	}
	function deleteContact(contactId) {
		const checkbox = document.querySelector(`#contacts-table-body2 input[type="checkbox"][data-id="${contactId}"]`);
		if (checkbox && checkbox.checked) {
			const index = contacts2.findIndex((contact) => contact.id == contactId);
			if (index > -1) {
				contacts2.splice(index, 1);
				loadContacts();
			} else {
				console.error("Error deleting contact: Contact not found");
			}
		} else {
			alert("Please select the checkbox to delete the contact.");
		}
	}
	// Initial load
	loadContacts();
	// export csv
	document.getElementById("export-csv").addEventListener("click", function () {
		// Select all table rows in the tbody
		const rows = document.querySelectorAll("#contacts-table-body2 tr");
		// Prepare CSV content with header
		let csvContent = "data:text/csv;charset=utf-8,";
		csvContent += "Name,Email,Phone,Status\n"; // Header line
		// Iterate over each row and extract cell data, skipping the checkbox cell
		rows.forEach((row) => {
			const rowData = [];
			const cells = row.querySelectorAll("td");
			cells.forEach((cell, index) => {
				if (index > 0) { // Skip the first cell (checkbox)
					// Replace commas and trim whitespace
					rowData.push(cell.textContent.trim().replace(/,/g, ""));
				}
			});
			csvContent += rowData.join(",") + "\n"; // Join cell data with commas
		});
		// Create a download link and trigger click
		const encodedUri = encodeURI(csvContent);
		const link = document.createElement("a");
		link.setAttribute("href", encodedUri);
		link.setAttribute("download", "Contacts.csv");
		document.body.appendChild(link); // Required for Firefox
		link.click();
		// Clean up
		document.body.removeChild(link);
	});
</script>

<script>
    var baseUrl = "<?php echo base_url() ?>"; 
</script>
<script>
    $(document).ready(function(){
        var status = "";
        var type = "" ;
		var searchvalue = "" ;
        
        load_contacts_table(status,type,searchvalue);
        
        
        function load_contacts_table(status,type,searchvalue){
		  if ( $.fn.dataTable.isDataTable( '#contact-data' ) ) {
			  $( '#contact-data' ).DataTable().destroy();
		  }
          var dataTable = $('#contact-data').DataTable({
           'processing': true,
           'serverSide': true,
           'serverMethod': 'POST',
           dom: 'Blfrtip',
           buttons: [
                 'copyHtml5',
                 'excelHtml5',
                 'csvHtml5',
                 'pdfHtml5'
           ],

           //'searching': false, // Remove default Search Control
        
           'ajax': {
        
              'url':'getcontacts',
              'data': function(data){
                data.searchByStatus = status;
                data.searchByType = type;
				data.searchvalue = searchvalue;
             }
        
           },
        
           'columns': [
              { data: 'id' , orderable: false }, 
              { data: 'name' }, 
              { data: 'email' },
              { data: 'phone' },
			  { data: 'form_type' },
              { data: 'status' },
              { data: 'action' , orderable: false},
        
        
           ],
        
           
        
         });
        
          if(status != ""){
            dataTable.draw();
          }
        
          if(type != ""){
            dataTable.draw();
          }
        
        }

	   $(document).on('click', '#confirm-delete', function (e) {
	 
			const modal = document.getElementById("delete-success");	
			var checkedIds = [];
			$('.cont-checkbox:checked').each(function () {
				var dataId = $(this).data('id');
				checkedIds.push(dataId);
			});
			$.ajax({
				url: baseUrl + "/contact-delete",
				type: "POST",
				data: { delid: checkedIds ,id:3 },
				dataType: "html",
				error: function () {
					alert('Something is wrong');
				},
				success: function (data) {
				    document.getElementById("bg").classList.add("blur")
					closeModal("delete-modal");
				    modal.style.display = "block";
					$('.cont-checkbox').prop('checked', false);
					contactToDelete = null;
					load_contacts_table(status, type);
				}
			});
		});
        
        $('#status').on('change', function() {
              load_contacts_table($(this).val(),$("#type").val(),$("#search").val());
        });
        
        $('#type').on('change', function() {
              load_contacts_table($("#status").val(),$(this).val(),$("#search").val());
        });
		
		$('#search').on('input', function() {
              load_contacts_table($("#status").val(),$("#type").val(),$("#search").val());
        });
        
        
        $('#refresh-contacts').on('click', function() {
              load_contacts_table($("#status").val(),$("#type").val(),$("#search").val());
        });
        
    });

</script>

</html>