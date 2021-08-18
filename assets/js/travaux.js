 $(document).ready(function() {

    $('#table_data').dataTable({
        "pageLength": 100,
        fixedHeader: true,
        dom: "Bfrtip",
        buttons: [ 
            {
              extend: "excel",
              className: "btn-sm"
            },
            {
              extend: "pdfHtml5",
              className: "btn-sm"
            },
            {
              extend: "print",
              className: "btn-sm"
            },
        ],
        responsive: true,
        keys: true
    });


    
    $('.btn_delete').click(function(e) {
        e.preventDefault();
        var travaux_id = $(this).attr('data-id');
        var re = confirm('Êtes vous sûr de vouloir supprimer ce travaux?');
        if(re) {
            window.location.href = site_url + 'travaux/delete/' + travaux_id;
        }
    });

     $('.rdv').click(function(e) {
        e.preventDefault();
        //var travaux_id = $(this).attr('data-id');
        var re = confirm('Avez vous un autre rendez-vous?');
        if(re) {
          var form = document.createElement("form");
              form.setAttribute("method", 'post');
            window.location.href = site_url + 'evenement';
            document.body.appendChild(form);
            form.submit();
        }
    });

    // Delete many adherants
    $('#btn_delete_many').click(function(e) {
        e.preventDefault();
        var items = $('.check_item');
        var items_checked = [];

        for(var k = 0; k < items.length; k++) {
                if(items[k].checked)
                  items_checked.push(items[k]);
        }

        if(items_checked.length <= 0)
            return;
        
        if(items_checked.length > 1)
             re = confirm('Êtes vous sûr de vouloir supprimer les travaux sélectionnés?');
        else
            re = confirm('Êtes vous sûr de vouloir supprimer ce travaux sélectionné?');

        if(re) {
            $(this).html('Suppression en cours...');
            var form = document.createElement("form");
                form.setAttribute("method", 'post');
                form.setAttribute("action", site_url + 'travaux/delete-many');

            for(var i = 0; i < items_checked.length; i++) {
              if(items_checked[i].checked) {
                var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", 'items_checked[]');
                    hiddenField.setAttribute("value", items_checked[i].value);
                    form.appendChild(hiddenField);
              }
            }
            
            document.body.appendChild(form);
            form.submit();
        }

    });

    $("#table_travaux_id").change(function(e) {
          var travaux_id = $(this).val();
          window.location.href = site_url + 'travaux/' + travaux_id;
    }); 







 }); // End of document
