document
  .getElementById("refresh-contacts")
  .addEventListener("click", loadContacts);

document.getElementById("select-all").addEventListener("change", function () {
  const checkboxes = document.querySelectorAll(
    '#contacts-table-body2 input[type="checkbox"]'
  );
  checkboxes.forEach((checkbox) => (checkbox.checked = this.checked));
  updateDeleteIcons();
});

const contacts2 = [
  {
    id: 1,
    name: "Chloe Charroll",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 2,
    name: "Muhammad Ar",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 3,
    name: "Ezra St Juste",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "inactive",
    type: "Visiting Member",
  },
  {
    id: 4,
    name: "Bilawal Amanat",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 5,
    name: "Sam Safdar",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "inactive",
    type: "Visiting Member",
  },
  {
    id: 6,
    name: "Miller Johns",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 7,
    name: "Gen-O-Joe",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 8,
    name: "Haria Jr. Colea",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 9,
    name: "Haria Jr. Colea",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 10,
    name: "Haria Jr. Colea",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 11,
    name: "Haria Jr. Colea",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 12,
    name: "Haria Jr. Colea",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 13,
    name: "Haria Jr. Colea",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    id: 14,
    name: "Haria Jr. Colea",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
];

function loadContacts() {
    const contactList = document.getElementById("contacts-table-body2");
    contactList.innerHTML = "";
  
    if (contacts2.length === 0) {
      const noDataRow = document.createElement("tr");
      noDataRow.classList.add("no-data");
      noDataRow.innerHTML = '<td colspan="6" class="text-center">No data</td>';
      contactList.appendChild(noDataRow);
    } else {
      contacts2.forEach((contact) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>
            <div class="form-check">
                <input class="form-check-input cont-checkbox" type="checkbox" id="checkbox-${contact.id}" data-id="${contact.id}" onchange="updateDeleteIcons()">
                <label class="form-check-label" for="checkbox-${contact.id}"></label>
            </div>
            </td>
            <td><label>${contact.name}</label></td>
            <td><a href="mailto:${contact.email}">${contact.email}</a></td>
            <td class="cont">${contact.phone}</td>
            <td class="${contact.status === "active" ? "status-active" : "status-inactive"}">${contact.status}</td>
            <td>
              <svg id="edit-icon-${contact.id}" style="cursor: pointer" class="edit-contact" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 11 11" fill="${isChecked(contact.id) ? "red" : "#9F9DA8"}">
                <path style="cursor: pointer" class="edit-contact" d="M0 8.70802V11H2.29198L9.05487 4.23712L6.76288 1.94513L0 8.70802ZM10.8212 2.47076C11.0596 2.23239 11.0596 1.84428 10.8212 1.60592L9.39408 0.178775C9.15571 -0.0595916 8.76761 -0.0595916 8.52924 0.178775L7.41075 1.29726L9.70273 3.58925L10.8212 2.47076Z"/>
              </svg>
    
              <svg id="delete-icon-${contact.id}" data-id="${contact.id}" class="delete-contact" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="12" height="15" viewBox="0 0 9 11" fill="#9F9DA8">
                <path id="delete-icon-${contact.id}" data-id="${contact.id}" style="cursor: pointer" class="delete-contact" d="M1.00491 9.78052C1.00491 10.4513 1.52343 11 2.1573 11H6.76683C7.40068 11 7.91919 10.4513 7.91919 9.78052V2.75H1.00491V9.78052ZM8.78348 0.916667H6.62277L5.89933 0H3.0248L2.30134 0.916667H0.140625V1.83333H8.78348V0.916667Z" />
              </svg>
            </td>
          `;
        contactList.appendChild(row);
      });
    }
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
    document.getElementById("bg").classList.add("blur"); // Add blur class to main-content
  }
  
  document.getElementById("confirm-delete").addEventListener("click", function () {
    if (contactToDelete !== null) {
      deleteContact(contactToDelete);
      contactToDelete = null;
      closeModal();
    }
  });
  
  document.getElementById("cancel-delete").addEventListener("click", function () {
    contactToDelete = null;
    closeModal();
  });
  
  window.addEventListener("click", function (event) {
    const modal = document.getElementById("delete-modal");
    if (event.target == modal) {
      contactToDelete = null;
      closeModal();
    }
  });
  
  function closeModal() {
    const modal = document.getElementById("delete-modal");
    modal.style.display = "none";
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
  
  
  