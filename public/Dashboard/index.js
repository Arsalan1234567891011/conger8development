// Select all nav items
const navItems = document.querySelectorAll('.sidebar-item');

navItems.forEach((item) => {
  // Add click event listener to each nav item
  item.addEventListener('click', function () {
    // Remove 'dash' class from all nav items
    navItems.forEach((i) => i.classList.remove('dash'));

    // Add 'dash' class to the clicked nav item
    this.classList.add('dash');
  });
});

function toggleSidebar() {
  document.querySelector(".sidebar").classList.toggle("collapsed");
  document.querySelector(".main-content").classList.toggle("expanded");
  document.querySelector(".toggle-btn").classList.toggle("collapsed");
}

// Date filter toggle
document.addEventListener("DOMContentLoaded", function () {
  const dateFilterButton = document.getElementById("dateFilter");
  const dateCard = document.getElementById("dateCard");
  const blurBackground = document.getElementById("main-content");

  dateFilterButton.addEventListener("click", function (event) {
    event.stopPropagation(); // Prevent event from bubbling to the document
    dateCard.classList.toggle("show");
    blurBackground.classList.toggle("blur");
  });

  document.addEventListener("click", function (event) {
    if (!dateCard.contains(event.target) && event.target !== dateFilterButton) {
      dateCard.classList.remove("show");
      blurBackground.classList.remove("blur");
    }
  });



  // Define the image icons for previous and next arrows
  const prevArrowImage = `
      <svg style="margin-top: 10px" xmlns="http://www.w3.org/2000/svg" width="14" height="21" viewBox="0 0 14 21">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9143 0.939573C13.9344 1.61095 14.2171 2.98217 13.5458 4.00229C12.021 6.31909 10.6607 8.01484 9.09673 9.38506C8.46565 9.93796 7.81712 10.4241 7.13456 10.8703C9.31064 12.4776 11.0247 14.1881 13.3487 16.7932C14.1617 17.7045 14.082 19.1023 13.1707 19.9152C12.2594 20.7282 10.8616 20.6485 10.0486 19.7372C6.93108 16.2426 5.1895 14.6738 1.71492 12.586C1.01553 12.1657 0.604407 11.3945 0.645378 10.5796C0.686349 9.76465 1.17276 9.03853 1.91077 8.69055C3.77164 7.81313 5.0439 7.05618 6.1824 6.0587C7.32969 5.05352 8.43836 3.71836 9.85159 1.57103C10.523 0.550913 11.8942 0.2682 12.9143 0.939573Z"/>
      </svg>
    `;

  const nextArrowImage = `
      <svg style="margin-top: 10px" xmlns="http://www.w3.org/2000/svg" width="15" height="21" viewBox="0 0 15 21">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.89427 0.939573C2.91439 0.2682 4.28562 0.550913 4.95699 1.57103C6.37022 3.71836 7.47889 5.05352 8.62619 6.0587C9.76468 7.05618 11.0369 7.81313 12.8978 8.69055C13.6358 9.03853 14.1222 9.76465 14.1632 10.5796C14.2042 11.3945 13.7931 12.1657 13.0937 12.586C9.61908 14.6738 7.8775 16.2426 4.75995 19.7372C3.94698 20.6485 2.54918 20.7282 1.63789 19.9152C0.726591 19.1023 0.646884 17.7045 1.45986 16.7932C3.78389 14.1881 5.49794 12.4776 7.67403 10.8703C6.99147 10.4241 6.34293 9.93796 5.71186 9.38506C4.14792 8.01484 2.78758 6.31909 1.26282 4.00229C0.591442 2.98217 0.874156 1.61095 1.89427 0.939573Z"/>
      </svg>
    `;

  const calendar1 = flatpickr("#calendar1", {
    inline: true,
    defaultDate: "2022-05-13",
    prevArrow: prevArrowImage,
    nextArrow: nextArrowImage,
    onChange: function (selectedDates, dateStr, instance) {
      instance.element.setAttribute("value", dateStr);
    },
  });

  const calendar2 = flatpickr("#calendar2", {
    inline: true,
    defaultDate: "2024-05-26",
    prevArrow: prevArrowImage,
    nextArrow: nextArrowImage,
    onChange: function (selectedDates, dateStr, instance) {
      instance.element.setAttribute("value", dateStr);
    },
  });

  // Apply filter button click handler
  document.querySelector(".apply").addEventListener("click", () => {
    alert("Filter Applied");
  });

  // Reset filter button click handler
  document.querySelector(".reset").addEventListener("click", () => {
    calendar1.setDate(new Date(), false);
    calendar2.setDate(new Date(), false);
  });
});
document.addEventListener("DOMContentLoaded", function () {
  const dateFilterButton = document.getElementById("dateFilter2");
  const dateCard = document.getElementById("dateCard");

  dateFilterButton.addEventListener("click", function (event) {
    event.stopPropagation(); // Prevent event from bubbling to the document
    dateCard.classList.toggle("show");
  });

  document.addEventListener("click", function (event) {
    if (!dateCard.contains(event.target) && event.target !== dateFilterButton) {
      dateCard.classList.remove("show");
    }
  });



  // Define the image icons for previous and next arrows
  const prevArrowImage = `
      <svg style="margin-top: 10px" xmlns="http://www.w3.org/2000/svg" width="14" height="21" viewBox="0 0 14 21">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9143 0.939573C13.9344 1.61095 14.2171 2.98217 13.5458 4.00229C12.021 6.31909 10.6607 8.01484 9.09673 9.38506C8.46565 9.93796 7.81712 10.4241 7.13456 10.8703C9.31064 12.4776 11.0247 14.1881 13.3487 16.7932C14.1617 17.7045 14.082 19.1023 13.1707 19.9152C12.2594 20.7282 10.8616 20.6485 10.0486 19.7372C6.93108 16.2426 5.1895 14.6738 1.71492 12.586C1.01553 12.1657 0.604407 11.3945 0.645378 10.5796C0.686349 9.76465 1.17276 9.03853 1.91077 8.69055C3.77164 7.81313 5.0439 7.05618 6.1824 6.0587C7.32969 5.05352 8.43836 3.71836 9.85159 1.57103C10.523 0.550913 11.8942 0.2682 12.9143 0.939573Z"/>
      </svg>
    `;

  const nextArrowImage = `
      <svg style="margin-top: 10px" xmlns="http://www.w3.org/2000/svg" width="15" height="21" viewBox="0 0 15 21">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.89427 0.939573C2.91439 0.2682 4.28562 0.550913 4.95699 1.57103C6.37022 3.71836 7.47889 5.05352 8.62619 6.0587C9.76468 7.05618 11.0369 7.81313 12.8978 8.69055C13.6358 9.03853 14.1222 9.76465 14.1632 10.5796C14.2042 11.3945 13.7931 12.1657 13.0937 12.586C9.61908 14.6738 7.8775 16.2426 4.75995 19.7372C3.94698 20.6485 2.54918 20.7282 1.63789 19.9152C0.726591 19.1023 0.646884 17.7045 1.45986 16.7932C3.78389 14.1881 5.49794 12.4776 7.67403 10.8703C6.99147 10.4241 6.34293 9.93796 5.71186 9.38506C4.14792 8.01484 2.78758 6.31909 1.26282 4.00229C0.591442 2.98217 0.874156 1.61095 1.89427 0.939573Z"/>
      </svg>
    `;

  const calendar1 = flatpickr("#calendar1", {
    inline: true,
    defaultDate: "2022-05-13",
    prevArrow: prevArrowImage,
    nextArrow: nextArrowImage,
    onChange: function (selectedDates, dateStr, instance) {
      instance.element.setAttribute("value", dateStr);
    },
  });

  const calendar2 = flatpickr("#calendar2", {
    inline: true,
    defaultDate: "2024-05-26",
    prevArrow: prevArrowImage,
    nextArrow: nextArrowImage,
    onChange: function (selectedDates, dateStr, instance) {
      instance.element.setAttribute("value", dateStr);
    },
  });

  // Apply filter button click handler
  document.querySelector(".apply").addEventListener("click", () => {
    alert("Filter Applied");
  });

  // Reset filter button click handler
  document.querySelector(".reset").addEventListener("click", () => {
    calendar1.setDate(new Date(), false);
    calendar2.setDate(new Date(), false);
  });
});
// ----------------------------------------------------------------------------
$(document).ready(function () {
  $("#profileImage, .dropdown-icon").on("click", function () {
    $(this).parent().find(".dropdown-menu").toggleClass("show");
  });
});

$(document).click(function (event) {
  if (
    !$(event.target).closest(".profile-dropdown").length &&
    !$(event.target).closest(".dropdown-icon").length
  ) {
    $(".dropdown-menu").removeClass("show");
  }
});

$(document).ready(function () {
  $("#monthly-tab").click(function () {
    $("#monthly-tab").addClass("active");
    $("#yearly-tab").removeClass("active");
    $("#monthly").addClass("show active");
    $("#yearly").removeClass("show active");
  });

  $("#yearly-tab").click(function () {
    $("#yearly-tab").addClass("active");
    $("#monthly-tab").removeClass("active");
    $("#yearly").addClass("show active");
    $("#monthly").removeClass("show active");
  });
});

// // Initialize chart
let myPieChart, myFormChart;

function getCSSVariableValue(variableName) {
  return getComputedStyle(document.documentElement)
    .getPropertyValue(variableName)
    .trim();
}

function createPieChart() {
  var ctx = document.getElementById("myPieChart").getContext("2d");

  // Destroy existing chart instance if it exists
  if (myPieChart) {
    myPieChart.destroy();
  }

  myPieChart = new Chart(ctx, {
    type: "pie",
    data: {
      labels: ["Total Visitors", "First Time Visitors", "Returning Visitors"],
      datasets: [
        {
          data: [9, 5, 4],
          backgroundColor: [
            getCSSVariableValue('--piechart-bg1'),
            getCSSVariableValue('--piechart-bg2'),
            "#FFB169" // Static color or based on theme
          ],
          borderColor: [
            getCSSVariableValue('--piechart-bg1'),
            getCSSVariableValue('--piechart-bg2'),
            "#FFB169" // Static color or based on theme
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: false,
      plugins: {
        tooltip: {
          callbacks: {
            label: function (tooltipItem) {
              const label = tooltipItem.label || "";
              const value = tooltipItem.raw || 0;
              return `${label}: ${value}`;
            },
          },
        },
      },
      legend: {
        display: false, // Hide the default legend
      },
    },
  });
  // Custom legend functionality
  document.querySelectorAll(".custom-legend div").forEach(function (legend, index) {
    legend.addEventListener("click", function () {
      const meta = myPieChart.getDatasetMeta(0);
      meta.data[index].hidden = !meta.data[index].hidden;
      myPieChart.update();
    });
  });
}

function createFormChart() {
  var shh = document.getElementById("myChart").getContext("2d");

  // Destroy existing chart instance if it exists
  if (myFormChart) {
    myFormChart.destroy();
  }

  myFormChart = new Chart(shh, {
    type: "doughnut",
    data: {
      labels: ["ALERTS", "Other Applications"],
      datasets: [
        {
          label: "# of Votes",
          data: [11, 47],
          backgroundColor: [
            getCSSVariableValue('--doughnut-bg1'),
            getCSSVariableValue('--doughnut-bg2')
          ],
          hoverBackgroundColor: [
            getCSSVariableValue('--doughnut-bg1'),
            getCSSVariableValue('--doughnut-bg2')
          ],
          borderWidth: 0,
        },
      ],
    },
    options: {
      responsive: true,
      legend: {
        display: false,
      },
      cutoutPercentage: 82,
      rotation: 1 * Math.PI,
      circumference: 1 * Math.PI,
    },
  });
}

document.querySelector("#theme-toggle").addEventListener("click", function () {
  // Toggle theme class
  document.body.classList.toggle("dark-theme");
  document.body.classList.toggle("light-theme");

  // Apply the new theme immediately
  document.body.classList.add("theme-updating");

  // Use a short delay to ensure theme change is applied before recreating charts
  setTimeout(() => {
    // Destroy existing charts
    if (myPieChart) {
      myPieChart.destroy();
    }
    if (myFormChart) {
      myFormChart.destroy();
    }

    // Recreate the charts to apply the new theme
    createPieChart();
    createFormChart();

    // Remove the theme-updating class after charts are recreated
    document.body.classList.remove("theme-updating");
  }, 100); // Adjust the delay if needed
});

// Initial chart creation
document.addEventListener("DOMContentLoaded", function () {
  document.body.classList.add("light-theme"); // Set initial theme
  createPieChart();
  createFormChart();
});

//-------------------------------------------------------------------------------------------------------


//   attendece card working

document.addEventListener("DOMContentLoaded", function () {
  // Sample data fetching function
  function fetchAttendanceData() {
    // This is where you will replace with your backend API call
    return new Promise((resolve) => {
      setTimeout(() => {
        resolve({
          members: 13,
          congregation: 22,
        });
      }, 200);
    });
  }

  // Function to update the chart
  function updateChart(data) {
    const membersBar = document.getElementById("members-bar");
    const congregationBar = document.getElementById("congregation-bar");
    const membersValue = document.getElementById("members-value");
    const congregationValue = document.getElementById("congregation-value");

    membersBar.style.height = `${data.members * 4}px`; // Adjust multiplier as needed
    membersValue.textContent = data.members;

    congregationBar.style.height = `${data.congregation * 4}px`; // Adjust multiplier as needed
    congregationValue.textContent = data.congregation;
  }

  // Fetch data and update chart
  fetchAttendanceData().then((data) => {
    updateChart(data);
  });
});

// FORM CARD
// function createFormChart() {
// var shh = document.getElementById("myChart");
// var myChart = new Chart(shh, {
//   type: "doughnut",
//   data: {
//     labels: ["ALERTS", "Other Applications"],
//     datasets: [
//       {
//         label: "# of Votes",
//         data: [11, 47],
//         backgroundColor: ["#F2454E", "#f0f0f0"],
//         hoverBackgroundColor: ["#F2454E", "#f0f0f0"],
//         borderWidth: 0,
//       },
//     ],
//   },
//   options: {
//     responsive: true,
//     legend: {
//       display: false,
//     },
//     cutoutPercentage: 82,
//     rotation: 1 * Math.PI,
//     circumference: 1 * Math.PI,
//   },
// });
// }
// createFormChart();

// recent contacts

const contacts = [
  {
    name: "Chloe Charroll",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    name: "Muhammad Ar",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    name: "Ezra St Juste",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "inactive",
    type: "Visiting Member",
  },
  {
    name: "Bilawal Amanat",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    name: "Sam Safdar",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "inactive",
    type: "Visiting Member",
  },
  {
    name: "Miller Johns",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    name: "Gen-O-Joe",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
  {
    name: "Haria Jr. Colea",
    email: "duqy@mailinator.com",
    phone: "03108406323",
    status: "active",
    type: "Visiting Member",
  },
];

function loadContacts() {
  const tbody = document.getElementById("contacts-table-body");
  tbody.innerHTML = "";

  contacts.forEach((contact) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td><label>${contact.name}</label></td>
      <td><a href="mailto:${contact.email}">${contact.email}</a></td>
      <td class="cont">${contact.phone}</td>
      <td class="${contact.status === "active" ? "status-active" : "status-inactive"
      }">${contact.status}</td>
      <td class="cont">${contact.type}</td>
    `;
    tbody.appendChild(row);
  });
}

document.getElementById("refresh-contacts").addEventListener("click", () => {
  loadContacts();
});

window.onload = () => {
  loadContacts();
};


//-----------------------------------------------------------------------------------------------
function toggleNav() {
  const sidebar = document.getElementById("mySidebar");
  const main = document.getElementById("main");

  sidebar.classList.toggle("closed");

  if (sidebar.classList.contains("closed")) {
    // Sidebar is closed, adjust main content area for full width
    main.classList.replace("col-md-9", "col-md-11");
    main.classList.replace("col-lg-9", "col-lg-11");
    main.classList.replace("col-xl-10", "col-xl-11");
  } else {
    // Sidebar is open, adjust main content area for narrower width
    main.classList.replace("col-md-11", "col-md-9");
    main.classList.replace("col-lg-11", "col-lg-9");
    main.classList.replace("col-xl-11", "col-xl-10");
  }
}

// Automatically close the sidebar on medium screens
function autoCloseSidebar() {
  const sidebar = document.getElementById("mySidebar");
  const main = document.getElementById("main");
  if (window.innerWidth < 992) { // Bootstrap's medium breakpoint is <992px
    sidebar.classList.add("closed");
    main.classList.replace("col-md-9", "col-md-11");
    main.classList.replace("col-lg-9", "col-lg-11");
    main.classList.replace("col-xl-10", "col-xl-11");
  } else {
    sidebar.classList.remove("closed");
    main.classList.replace("col-md-11", "col-md-9");
    main.classList.replace("col-lg-11", "col-lg-9");
    main.classList.replace("col-xl-11", "col-xl-10");
  }
}

// Add event listener for window resize
window.addEventListener("resize", autoCloseSidebar);

// Call on page load to set the initial state
document.addEventListener("DOMContentLoaded", autoCloseSidebar);


// Notification Pannel javascript
$(document).ready(function () {
  const $blurBackground = $("#main-content");

  $('#notification-icon').click(function (event) {
    event.stopPropagation(); // Prevent the click from propagating to the document
    $('#notification-card').toggle();
    $blurBackground.toggleClass("blur");
  });

  $(document).click(function (event) {
    if (!$(event.target).closest('#notification-card, #notification-icon').length) {
      if ($('#notification-card').is(":visible")) {
        $('#notification-card').hide();
        $blurBackground.removeClass("blur");
      }
    }
  });

  $('#notification-card').click(function (event) {
    event.stopPropagation(); // Prevent the click inside the card from closing it
  });
});

//-----------------------------------------------------------------------------------------------

// Ensure the theme is set correctly on page load
(function () {
  const currentTheme = localStorage.getItem("theme") || "light";
  document.documentElement.setAttribute("data-theme", "light"); // Always set to light mode on page load
  localStorage.setItem("theme", "light"); // Update localStorage to store light mode
})();

document.addEventListener("DOMContentLoaded", () => {
  const toggleButton = document.getElementById("theme-toggle");

  toggleButton.addEventListener("click", () => {
    const newTheme = document.documentElement.getAttribute("data-theme") === "light" ? "dark" : "light";
    document.documentElement.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
  });
});
// Ensure the theme is set correctly on page load
(function () {
  const currentTheme = localStorage.getItem("theme") || "light";
  document.documentElement.setAttribute("data-theme", "light"); // Always set to light mode on page load
  localStorage.setItem("theme", "light"); // Update localStorage to store light mode
})();

document.addEventListener("DOMContentLoaded", () => {
  const toggleButton = document.getElementById("theme-toggle2");

  toggleButton.addEventListener("click", () => {
    const newTheme = document.documentElement.getAttribute("data-theme") === "light" ? "dark" : "light";
    document.documentElement.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
  });
});


//---------------------------------------------------------------------------------------------------
// event card

const events = [
  { date: "24 March", title: "Event Number One", time: "10:00AM - 11:00AM" },
  { date: "25 March", title: "Event Number Two", time: "10:00AM - 11:00AM" },
  { date: "28 March", title: "Event Number Three", time: "10:00AM - 11:00AM" },
];

$(document).ready(function () {
  const eventList = $("#event-list");
  events.forEach((event) => {
    const eventCard = `
          <div class="list-group-item event-card">
              <div class="eventd-and-d">
              <div class="event-date">${event.date.split(" ")[0]}</div>
              <div class="event-day">${event.date.split(" ")[1]}</div>
              </div>
              <div class="event-details">
                  <div>
                      <h5 style="font-weight: 700;">${event.title}</h5>
                      <p>${event.time}</p>
                  </div>
                  <button class="btn event-btn btn-secondary btn-sm">View Details</button>
              </div>
          </div>
      `;
    eventList.append(eventCard);
  });
});

// all contacts implement

// $(document).ready(function() {
//   $('#all-contacts-btn').click(function(event) {
//     event.preventDefault(); // Prevent the default link behavior
//     $('#loader').show(); // Show the loader

//     // Simulate a delay before loading content
//     setTimeout(function() {
//       $('#main-content').load('../all-contacts/index.html', function(response, status, xhr) {
//         $('#loader').hide(); // Hide the loader after content is loaded
//         if (status == "error") {
//           console.log("Error: " + xhr.status + " " + xhr.statusText);
//         }
//       });
//     }, 500);
//   });
// });

// ----------------------------------------------------------------------------------------------------------

//                                       Billing File Implementation

// $(document).ready(function() {
//   $('#billing').click(function(event) {
//     event.preventDefault(); // Prevent the default link behavior
//     $('#loader').show(); // Show the loader

//     // Simulate a delay before loading content
//     setTimeout(function() {
//       $('#main-content').load('../Billing/billing.html', function(response, status, xhr) {
//         $('#loader').hide(); // Hide the loader after content is loaded
//         if (status == "error") {
//           console.log("Error: " + xhr.status + " " + xhr.statusText);
//         }
//       });
//     }, 500);
//   });
// });

//------------------------------------------------------------------------------------------------------------
// task card

const tasks = [
  { title: "Task no. 01", done: true },
  { title: "Task no. 02", done: false },
  { title: "Task no. 03", done: true },
  { title: "Task no. 04", done: false },
  { title: "Task no. 05", done: true },
];

function renderTasks() {
  const taskList = $("#task-list");
  taskList.empty();
  tasks.forEach((task, index) => {
    const taskItem = `
                  <div class="list-group-item task-item ${task.done ? "done" : ""
      }" data-index="${index}">
                    <div>
                        <input type="checkbox" ${task.done ? "checked" : ""
      } class="task-checkbox" id="checkbox${index}">
                        <label class="check" for="checkbox${index}"></label>
                        <span class="task-title">${task.title}</span>
                    </div>
                    <a style="color: #FF658A;" href="#" class="delete-task">Delete Task</a>
                </div>
      `;
    taskList.append(taskItem);
  });
}

$(document).ready(function () {
  renderTasks();

  $("#task-list").on("change", ".task-checkbox", function () {
    const index = $(this).closest(".task-item").data("index");
    tasks[index].done = this.checked;
    renderTasks();
  });

  $("#task-list").on("click", ".delete-task", function (e) {
    e.preventDefault();
    const index = $(this).closest(".task-item").data("index");
    tasks.splice(index, 1);
    renderTasks();
  });

  $("#mark-all-done").click(function () {
    tasks.forEach((task) => (task.done = true));
    renderTasks();
  });

  $("#delete-all-tasks").click(function () {
    tasks.length = 0;
    renderTasks();
  });

  $("#dropdownToggle").click(function () {
    $("#dropdownMenu").toggle();
  });

  $(document).click(function (e) {
    if (!$(e.target).closest(".task-menu").length) {
      $("#dropdownMenu").hide();
    }
  });
});

// $(document).ready(function() {
//   $('#accountsetting').click(function(event) {
//     event.preventDefault(); // Prevent the default link behavior
//     $('#loader').show(); // Show the loader

//     // Simulate a delay before loading content
//     setTimeout(function() {
//       $('#main-content').load('../profile/int.html', function(response, status, xhr) {
//         $('#loader').hide(); // Hide the loader after content is loaded
//         if (status == "error") {
//           console.log("Error: " + xhr.status + " " + xhr.statusText);
//         } else {
//           // Use History API to change the URL without reloading the page
//           history.pushState(null, null, '/account-settings'); // You can change the URL to something meaningful
//         }
//       });
//     }, 500);
//   });
// });

// // Add event listener to handle back/forward navigation with History API
// window.addEventListener('popstate', function(event) {
//   // Handle what should happen when the user clicks "Back" or "Forward" buttons
//   $('#main-content').load('../profile/int.html'); // Load the appropriate content based on the URL
// });

//-----------------------------------------------------------------------------------------------

// Notification Pannel javascript
$(document).ready(function () {
  const $blurBackground = $("#main-content");

  $('#notification-icon').click(function (event) {
    event.stopPropagation(); // Prevent the click from propagating to the document
    $('#notification-card').toggle();
    $blurBackground.toggleClass("blur");
  });

  $(document).click(function (event) {
    if (!$(event.target).closest('#notification-card, #notification-icon').length) {
      if ($('#notification-card').is(":visible")) {
        $('#notification-card').hide();
        $blurBackground.removeClass("blur");
      }
    }
  });

  $('#notification-card').click(function (event) {
    event.stopPropagation(); // Prevent the click inside the card from closing it
  });
});

$(document).ready(function () {

  $('#notification-icon2').click(function (event) {
    event.stopPropagation(); // Prevent the click from propagating to the document
    $('#notification-card2').toggle();
  });

  $(document).click(function (event) {
    if (!$(event.target).closest('#notification-card2, #notification-icon2').length) {
      if ($('#notification-card2').is(":visible")) {
        $('#notification-card2').hide();
      }
    }
  });

  $('#notification-card').click(function (event) {
    event.stopPropagation(); // Prevent the click inside the card from closing it
  });
});


//-----------------------------------------------------------------------------------------------

// Ensure the theme is set correctly on page load
(function () {
  const currentTheme = localStorage.getItem("theme") || "light";
  document.documentElement.setAttribute("data-theme", "light"); // Always set to light mode on page load
  localStorage.setItem("theme", "light"); // Update localStorage to store light mode
})();

document.addEventListener("DOMContentLoaded", () => {
  const toggleButton = document.getElementById("theme-toggle2");

  toggleButton.addEventListener("click", () => {
    const newTheme = document.documentElement.getAttribute("data-theme") === "light" ? "dark" : "light";
    document.documentElement.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
  });
});
// Ensure the theme is set correctly on page load
(function () {
  const currentTheme = localStorage.getItem("theme") || "light";
  document.documentElement.setAttribute("data-theme", "light"); // Always set to light mode on page load
  localStorage.setItem("theme", "light"); // Update localStorage to store light mode
})();

document.addEventListener("DOMContentLoaded", () => {
  const toggleButton = document.getElementById("theme-toggle2");

  toggleButton.addEventListener("click", () => {
    const newTheme = document.documentElement.getAttribute("data-theme") === "light" ? "dark" : "light";
    document.documentElement.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
  });
});

document.getElementById('sidebartoggle').addEventListener('click', function () {
  const sidebar = document.getElementById('sidebarSticky');

  // Toggle style.display property
  if (sidebar.style.display === 'none' || sidebar.style.display === '') {
    sidebar.style.display = 'block'; // Show the sidebar
  } else {
    sidebar.style.display = 'none'; // Hide the sidebar
  }
});


document.getElementById('headerToggle').addEventListener('click', function () {
  const header = document.getElementById('responsive-head');

  // Toggle style.display property
  if (header.style.display === 'none' || header.style.display === '') {
    header.style.display = 'flex'; // Show the sidebar
  } else {
    header.style.display = 'none'; // Hide the sidebar
  }
});
