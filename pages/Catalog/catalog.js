function salvarDados() {

    var NameClient = document.getElementById('NameClient').value;

    var Email = document.getElementById('email').value;
    
    var Telefone = document.getElementById('telefone').value;

    var NameProduct = document.getElementById('nomeProduct').value;

    var Valor = document.getElementById('valor').value;
    
    var Quant = document.getElementById('quant').value;

    if(NameClient == "") {
       alert("Nome nao pode ficar vazio ")
    } else if (Email == "") {
       alert("Email nao pode ficar vazio ")
    }  else {
        
        console.log(NameClient);
        console.log(Email);
        console.log(Telefone);
        console.log(NameProduct);
        console.log(Valor);
        console.log(Quant);

        var xhr = new XMLHttpRequest();
        
        xhr.open("POST", "salvar_dados.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText);
            document.getElementById("formularioContato").reset(); // Limpar o formulário após salvar os dados
            }
        };
            
        xhr.send("NameClient=" + NameClient + "&email=" + email + "&nomeProduct=" + nomeProduct + "&valor=" + valor);
        }              
 }

 function loadModalContent(url, title, description, modalId) {
  fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error('Erro na resposta do servidor');
      }
      return response.text();
    })
    .then(data => {
     
      document.getElementById('modal-container').innerHTML = data;
      document.getElementById(modalId + 'Label').innerText = title;
      document.getElementById(modalId + 'Description').innerText = description;

      // Inicializa o modal após carregar o conteúdo
      var myModal = new bootstrap.Modal(document.getElementById(modalId), {});
      myModal.show();
    })
    .catch(error => console.error('Erro ao carregar o modal:', error));
}

