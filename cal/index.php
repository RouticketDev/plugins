<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generador de Enlace de Evento</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <h2>Generador de Enlace de Evento</h2>
  <form id="eventForm">
    <div class="form-group">
      <label for="eventDate">Fecha y Hora:</label>
      <input type="datetime-local" class="form-control" id="eventDate" required>
    </div>
    <div class="form-group">
      <label for="eventTitle">Título:</label>
      <input type="text" class="form-control" id="eventTitle" required>
    </div>
    <div class="form-group">
      <label for="eventLocation">Ciudad:</label>
      <input type="text" class="form-control" id="eventLocation" required>
    </div>
    <div class="form-group">
      <label for="eventDetails">Detalles:</label>
      <textarea class="form-control" id="eventDetails" rows="3" required></textarea>
    </div>
    <div class="form-group">
      <label for="eventEmail">Correo Electrónico:</label>
      <input type="email" class="form-control" id="eventEmail" required>
    </div>
    <button type="submit" class="btn btn-primary">Generar Enlace</button>
  </form>

  <div id="eventLinkContainer" class="mt-4"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
  $(document).ready(function(){
    $('#eventForm').submit(function(event){
      event.preventDefault();
      
      var eventDate = $('#eventDate').val().replace("T", "T").replace(/-/g, "").replace(":", "") + "Z";
      var eventTitle = encodeURIComponent($('#eventTitle').val());
      var eventLocation = encodeURIComponent($('#eventLocation').val());
      var eventDetails = encodeURIComponent($('#eventDetails').val());
      var eventEmail = encodeURIComponent($('#eventEmail').val());

      var eventLink = "http://www.google.com/calendar/event?action=TEMPLATE&dates=" + eventDate + "&text=" + eventTitle + "&location=" + eventLocation + "&details=" + eventDetails + "&add=" + eventEmail;

      $('#eventLinkContainer').html('<a href="' + eventLink + '" target="_blank" class="btn btn-success">Enlace del Evento</a>');
    });
  });
</script>

</body>
</html>

