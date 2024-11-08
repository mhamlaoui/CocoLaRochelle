
export function sendeth(form_id, submit_btn_id, location) {
    const send_button = document.getElementById(submit_btn_id);
    const search_trajet_form = document.getElementById(form_id);

    send_button.addEventListener('click', function (ev) {
        ev.preventDefault();
        // ici on mets l'information du form dans un objet formData (qui gere aussi les headers)
        const data_in_form = new FormData(search_trajet_form);
        data_in_form.append('form_identifier', form_id) // pour pouvoir l'indentifier depuis PHP
        
        fetch(location, {
            method: "POST",
            body: data_in_form
        }).then(response => {
            if (!response.ok) {
                throw new Error("Problem getting data from : " + form_id + " response not ok");
            } else {
                return response.json(); // envoi en format JSON
            }
        }).then(data => console.log(data)
        ).catch(data => console.log(data)) // si il y a pas les infos, montre egalement ce que t'as
    })
}