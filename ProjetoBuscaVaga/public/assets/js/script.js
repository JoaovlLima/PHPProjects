
    function toggleCNPJField() {
        const tipo = document.getElementById('tipo').value;
        const cnpjField = document.getElementById('cnpj-field');
        if (tipo === 'empresa') {
            cnpjField.style.display = 'block';
        } else {
            cnpjField.style.display = 'none';
        }
    }
    

