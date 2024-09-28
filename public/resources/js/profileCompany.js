const btnContainer = document.getElementById("switchBtn");
const about = document.getElementById("about");
const jobs = document.getElementById("jobs");

const buttonTemplates = {
    about: `
    <button
        onclick="window.location.href = '/company/profile/edit'"
      class="bg-indigo-600 text-white font-semibold py-3 px-6 rounded-full shadow-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
    >
      Edit Profile Perusahaan
    </button>
  `,
    jobs: `
    <button
        onclick="window.location.href = '/job/create'"
      class="bg-indigo-600 text-white font-semibold py-3 px-6 rounded-full shadow-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
    >
      Tambah Pekerjaan
    </button>
  `,
};

about.addEventListener("click", function () {
    updateButton("about");
});

jobs.addEventListener("click", function () {
    updateButton("jobs");
});

function updateButton(type) {
    btnContainer.innerHTML = buttonTemplates[type];
}
