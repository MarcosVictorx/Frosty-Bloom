function openModal(title, description, type) {
    document.getElementById('product-title').innerText = title;
    document.getElementById('product-description').innerText = description;
    document.getElementById('product-type').innerText = "Tipo: " + type;
}


$(document).ready(function() {
    $('#saveForm').submit(function(e) {
      e.preventDefault(); // Impede o envio do formulário padrão

      // Captura os dados do formulário
      var productName = $('#productName').val();
      // Captura outros campos do formulário se houver

      // Envia os dados para o arquivo PHP usando AJAX
      $.ajax({
        url: 'save_data.php',
        type: 'POST',
        data: {
          productName: productName,
          // Outros campos do formulário aqui
        },
        success: function(response) {
          // Manipule a resposta do arquivo PHP aqui, por exemplo, exibindo uma mensagem de sucesso
          alert('Dados salvos com sucesso!');
          $('#exampleModal').modal('hide'); // Fecha o modal após salvar os dados
        },
        error: function(xhr, status, error) {
          // Manipule os erros aqui, por exemplo, exibindo uma mensagem de erro
          alert('Ocorreu um erro ao salvar os dados.');
        }
      });
    });
  });