//app.js
import {
    getAppointments,
    createAppointment,
    updateAppointment,
    deleteAppointment
} from "./api.js";

const form = document.getElementById("appointment-form");
const list = document.getElementById("list");

async function loadAppointments() {
    const res = await getAppointments();

    list.innerHTML = "";

    res.data.forEach(app => {
        const li = document.createElement("li");

        li.innerHTML = `
            <strong>${app.name}</strong> - ${app.service} <br>
            ${app.date} <br>
            Status: ${app.status}
            <br>
            <button onclick="confirmAppointment(${app.id})">Confirm</button>
            <button onclick="deleteApp(${app.id})">Delete</button>
        `;

        list.appendChild(li);
    });
}

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const data = {
        name: document.getElementById("name").value,
        service: document.getElementById("service").value,
        date: document.getElementById("date").value
    };

    await createAppointment(data);

    form.reset();
    loadAppointments();
});

window.confirmAppointment = async (id) => {
    //console.log("L49 - Confirm clicked:", id); // DEBUG
    await updateAppointment(id, { status: "confirmed" });
    loadAppointments();
};

window.deleteApp = async (id) => {
     //console.log("L55 - Delete clicked:", id); // DEBUG
    await deleteAppointment(id);
    loadAppointments();
};

loadAppointments();
