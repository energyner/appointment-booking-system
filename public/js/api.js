//api.js
const API_URL = "http://localhost/www.energyner.net/19-api/appointments/api/v1/appointments.php";

export async function getAppointments() {
    const res = await fetch(API_URL);
    // const text = await res.text();   //  clave
    // console.log("RAW RESPONSE:", text);
    return res.json();
}

export async function createAppointment(data) {
    const res = await fetch(API_URL, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    });
    return res.json();
}

export async function updateAppointment(id, data) {
    //console.log("L23 - PATCH sending:", id, data);

    const res = await fetch(`${API_URL}?id=${id}`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    });

    return res.json();
}

export async function deleteAppointment(id) {
     const res = await fetch(`${API_URL}?id=${id}`, {
        method: "DELETE"
    });
    return res.json();
}
