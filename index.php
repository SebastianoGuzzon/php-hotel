<!DOCTYPE html>
<html>

<head>
  <title>Stampa degli Hotel</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">

  <style>
  body {
    background-color: #f8f9fa;
    padding: 20px;
  }

  .container {
    max-width: 800px;
    margin: 0 auto;
  }

  h1 {
    text-align: center;
    font-size: 28px;
    color: #343a40;
    margin-bottom: 30px;
  }

  table {
    background-color: #fff;
  }

  th {
    background-color: #343a40;
    color: red;
    text-align: center;
    vertical-align: middle;
  }

  td {
    text-align: center;
    vertical-align: middle;
  }
  </style>

</head>

<body>
  <h1>Lista degli Hotel</h1>

  <form method="POST" action="#" id="filterForm">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="parcheggioCheckbox" name="parcheggio">
      <label class="form-check-label" for="parcheggioCheckbox">Mostra solo Hotel con parcheggio</label>
    </div>
    <button type="submit" class="btn btn-primary">Filtra</button>
  </form>

  <div id="hotelList"></div>

  <script>
  // Array degli hotel
  var hotels = [{
      name: 'Hotel Belvedere',
      description: 'Hotel Belvedere Descrizione',
      parking: true,
      vote: 4,
      distance_to_center: 10.4
    },
    {
      name: 'Hotel Futuro',
      description: 'Hotel Futuro Descrizione',
      parking: true,
      vote: 2,
      distance_to_center: 2
    },
    {
      name: 'Hotel Rivamare',
      description: 'Hotel Rivamare Descrizione',
      parking: false,
      vote: 1,
      distance_to_center: 1
    },
    {
      name: 'Hotel Bellavista',
      description: 'Hotel Bellavista Descrizione',
      parking: false,
      vote: 5,
      distance_to_center: 5.5
    },
    {
      name: 'Hotel Milano',
      description: 'Hotel Milano Descrizione',
      parking: true,
      vote: 2,
      distance_to_center: 50
    }
  ];

  function stampaHotel(hotelArray) {
    var hotelList = document.getElementById("hotelList");

    // Rimuovi gli hotel precedenti, se presenti
    while (hotelList.firstChild) {
      hotelList.firstChild.remove();
    }

    // Creazione della tabella
    var table = document.createElement("table");
    table.classList.add("table", "table-striped");

    // Creazione dell'intestazione della tabella
    var thead = document.createElement("thead");
    var headerRow = document.createElement("tr");
    var headers = ["Nome", "Descrizione", "Parcheggio", "Voto", "Distanza dal centro"];
    headers.forEach(function(headerText) {
      var header = document.createElement("th");
      header.textContent = headerText;
      headerRow.appendChild(header);
    });
    thead.appendChild(headerRow);
    table.appendChild(thead);

    // Creazione del corpo della tabella
    var tbody = document.createElement("tbody");
    hotelArray.forEach(function(hotel) {
      var row = document.createElement("tr");
      var rowData = [
        hotel.name,
        hotel.description,
        hotel.parking ? "Sì" : "No",
        hotel.vote,
        hotel.distance_to_center
      ];
      rowData.forEach(function(data) {
        var cell = document.createElement("td");
        cell.textContent = data;
        row.appendChild(cell);
      });
      tbody.appendChild(row);
    });
    table.appendChild(tbody);

    // Aggiungi la tabella alla lista degli hotel
    hotelList.appendChild(table);
  }


  // Gestore dell'evento di invio del form
  document.getElementById("filterForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita il ricaricamento della pagina

    var parcheggioCheckbox = document.getElementById("parcheggioCheckbox");

    // Filtra gli hotel in base alla selezione del checkbox
    var filteredHotels = hotels;
    if (parcheggioCheckbox.checked) {
      filteredHotels = hotels.filter(function(hotel) {
        return hotel.parking === true;
      });
    }

    // Stampa gli hotel filtrati
    stampaHotel(filteredHotels);
  });

  // Stampa tutti gli hotel iniziali
  stampaHotel(hotels);
  </script>
</body>

</html>