<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generador de Enlace de Evento</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
      margin-top: 50px;
    }
    h2 {
      color: #007bff;
    }
    label {
      color: #495057;
    }
    button.btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    button.btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }
    .btn-success:hover {
      background-color: #218838;
      border-color: #218838;
    }
    .form-group label {
      font-weight: bold;
    }
    .form-group textarea.form-control {
      resize: none;
    }
    .icon {
      margin-right: 5px;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h2><i class="fas fa-calendar-plus icon"></i>Generador de Enlace de Evento para Google Calendar</h2>
  <form id="eventForm">
    <div class="form-group">
      <label for="eventDate"><i class="far fa-calendar-alt icon"></i>Fecha y Hora:</label>
      <input type="datetime-local" class="form-control" id="eventDate" required>
    </div>
    <div class="form-group">
      <label for="eventTitle"><i class="fas fa-heading icon"></i>Título:</label>
      <input type="text" class="form-control" id="eventTitle" required>
    </div>
    <div class="form-group">
      <label for="eventLocation"><i class="fas fa-map-marker-alt icon"></i>Ciudad:</label>
      <input type="text" class="form-control" id="eventLocation" required>
    </div>
    <div class="form-group">
      <label for="eventDetails"><i class="fas fa-info-circle icon"></i>Detalles:</label>
      <textarea class="form-control" id="eventDetails" rows="3" required></textarea>
    </div>
    <div class="form-group">
      <label for="eventEmail"><i class="far fa-envelope icon"></i>Correo Electrónico:</label>
      <input type="email" class="form-control" id="eventEmail" required>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-link icon"></i>Generar Enlace</button>
  </form>

  <div id="eventLinkContainer" class="mt-4"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
  $(document).ready(function(){
    $('#eventForm').submit(function(event){
      event.preventDefault();
      
      var eventDate = new Date($('#eventDate').val());
      var startDateTime = eventDate.toISOString().slice(0, 19).replace("T", ""); // Formato: YYYYMMDDTHHmmSS
      var endDateTime = new Date(eventDate.getTime() + (60 * 60 * 1000)).toISOString().slice(0, 19).replace("T", ""); // Agregamos 1 hora al inicio para obtener la hora de finalización

      var eventTitle = encodeURIComponent($('#eventTitle').val());
      var eventLocation = encodeURIComponent($('#eventLocation').val());
      var eventDetails = encodeURIComponent($('#eventDetails').val());
      var eventEmail = encodeURIComponent($('#eventEmail').val());

      var eventLink = "http://www.google.com/calendar/event?action=TEMPLATE&dates=" + startDateTime + "Z/" + endDateTime + "Z" + "&text=" + eventTitle + "&location=" + eventLocation + "&details=" + eventDetails + "&add=" + eventEmail;

      $('#eventLinkContainer').html('<a href="' + eventLink + '" target="_blank" class="btn btn-success"><i class="fas fa-external-link-alt icon"></i>Enlace del Evento</a>');
    });
  });
</script>

</body>
</html>


