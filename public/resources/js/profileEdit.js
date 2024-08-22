const skillInput = document.getElementById("skill");
const container = document.getElementById("skillTambah");
let skill = "";
let counter = 0;

document.getElementById("addSkill").addEventListener("click", () => {
    skill = skillInput.value;

    if (skill.length < 2) {
        return alert("Too Short");
    }
    counter++;

    let divElement = document.createElement("div");
    divElement.className =
        " relative h-[45px] w-[150px] flex items-center font-bold border-2 shadow-2xl mt-2 rounded-[50px] bg-[#F4F5F6]";
    divElement.id = `skill${counter}`;

    let cancelBtn = document.createElement("p");
    cancelBtn.className = "absolute right-5 cursor-pointer cancelbtn";
    cancelBtn.textContent = "X";
    cancelBtn.id = counter;

    let inputElement = document.createElement("input");
    inputElement.type = "text";
    inputElement.setAttribute("readonly", true);
    inputElement.className =
        "relative w-[95%] text-center text-black cursor-default outline-none bg-transparent";
    inputElement.placeholder = skill;
    inputElement.value = skill;

    divElement.appendChild(inputElement);
    divElement.appendChild(cancelBtn);

    container.appendChild(divElement);

    skillInput.value = "";

    if (document.querySelectorAll(".cancelbtn").length >= 2) {
        document.querySelectorAll(".cancelbtn").forEach((e) => {
            e.addEventListener("click", (h) => {
                const container = document.getElementById(
                    `skill${h.target.id}`
                );
                if (!container) {
                    return;
                }
                container.remove();
            });
        });
    } else {
        document.querySelector(".cancelbtn").addEventListener("click", (h) => {
            const container = document.getElementById(`skill${h.target.id}`);
            container.remove();
        });
    }
});
