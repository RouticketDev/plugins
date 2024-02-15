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
      background-color: #f0f0f0;
      background-image: url('https://source.unsplash.com/1600x900/?nature');
      background-size: cover;
      background-position: center;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.3);
      max-width: 500px;
      width: 100%;
    }
    .container h2 {
      color: #333;
      margin-bottom: 20px;
      text-align: center;
    }
    .form-group label {
      color: #333;
      font-weight: bold;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
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
  </style>
</head>
<body>

<div class="container">
  <h2><i class="far fa-calendar-alt"></i> Generador de Enlace de Evento</h2>
  <form id="eventForm">
    <div class="form-group">
      <label for="eventStartDate"><i class="far fa-clock"></i> Fecha y Hora de Inicio:</label>
      <input type="datetime-local" class="form-control" id="eventStartDate" required>
    </div>
    <div class="form-group">
      <label for="eventEndDate"><i class="far fa-clock"></i> Fecha y Hora de Fin:</label>
      <input type="datetime-local" class="form-control" id="eventEndDate" required>
    </div>
    <div class="form-group">
      <label for="eventTitle"><i class="fas fa-heading"></i> Título:</label>
      <input type="text" class="form-control" id="eventTitle" required>
    </div>
    <div class="form-group">
      <label for="eventLocation"><i class="fas fa-map-marker-alt"></i> Ciudad:</label>
      <input type="text" class="form-control" id="eventLocation" required>
    </div>
    <div class="form-group">
      <label for="eventDetails"><i class="fas fa-align-left"></i> Detalles:</label>
      <textarea class="form-control" id="eventDetails" rows="3" required></textarea>
    </div>
    <div class="form-group">
      <label for="eventEmail"><i class="far fa-envelope"></i> Correo Electrónico:</label>
      <input type="email" class="form-control" id="eventEmail" required>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-link"></i> Generar Enlace</button>
  </form>

  <div id="eventLinkContainer" class="mt-4"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $('#eventForm').submit(function(event){
      event.preventDefault();
      
      var startDate = new Date($('#eventStartDate').val());
      var endDate = new Date($('#eventEndDate').val());

      // Convertir fechas y horas al formato requerido (YYYYMMDDTHHmmSSZ)
      var startDateTime = startDate.toISOString().slice(0, 16).replace(/[-:]/g, "");
      var endDateTime = endDate.toISOString().slice(0, 16).replace(/[-:]/g, "");

      var eventTitle = encodeURIComponent($('#eventTitle').val());
      var eventLocation = encodeURIComponent($('#eventLocation').val());
      var eventDetails = encodeURIComponent($('#eventDetails').val());
      var eventEmail = encodeURIComponent($('#eventEmail').val());

      // Generar el enlace del evento
      var eventLink = "http://www.google.com/calendar/event?action=TEMPLATE&dates=" + startDateTime + "Z/" + endDateTime + "Z" + "&text=" + eventTitle + "&location=" + eventLocation + "&details=" + eventDetails;

      // Mostrar el enlace generado como un botón
      $('#eventLinkContainer').html('<a href="' + eventLink + '" target="_blank" class="btn btn-success"><i class="fas fa-external-link-alt"></i> Enlace del Evento</a>');
    });
  });
</script>

</body>
</html>





