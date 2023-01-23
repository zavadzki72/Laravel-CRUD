async function populateFieldsWithCep(cep){

    if(cep.length != 8){
        this.enableOrDisbaleAdressFields(false);
        return;
    }

    const response = await fetch(`https://brasilapi.com.br/api/cep/v2/${cep}`)
        .then((response) => {
            if(response.status == 200){
                return response.json();
            }
            if(response.status == 404){
                alert("CEP NAO ENCONTRADO!");
            }
        })
        .catch((error) => console.log(error));

    document.getElementById("street").value = response.street;
    document.getElementById("neighborhood").value = response.neighborhood;
    document.getElementById("city").value = response.city;
    document.getElementById("state").value = response.state;
    document.getElementById("country").value = "BR";

    this.enableOrDisbaleAdressFields(true);
}


function enableOrDisbaleAdressFields(value){
    document.getElementById("street").readOnly = value;
    document.getElementById("neighborhood").readOnly = value;
    document.getElementById("city").readOnly = value;
    document.getElementById("state").readOnly = value;
    document.getElementById("country").readOnly = value;
}