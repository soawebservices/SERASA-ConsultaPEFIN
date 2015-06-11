<?php
// The URL to POST to
$url = "http://www.soawebservices.com.br/webservices/producao/sws/administracao.asmx";

// The value for the SOAPAction: header
$action = "SOAWebServices/Saldo";
$mySOAP = <<<EOD
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:soaw="SOAWebServices">
   <soap:Header/>
   <soap:Body>
      <soaw:Saldo>
         <!--Optional:-->
         <soaw:Credenciais>
            <!--Optional:-->
            <soaw:Email>seu email aqui</soaw:Email>
            <!--Optional:-->
            <soaw:Senha>sua senha aqui</soaw:Senha>
         </soaw:Credenciais>
      </soaw:Saldo>
   </soap:Body>
</soap:Envelope>
EOD;

$headers = array(
    'Content-Type: text/xml; charset=utf-8',
    'Content-Length: ' . strlen($mySOAP),
    'SOAPAction: ' . $action
);


// Build the cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $mySOAP);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

// Send the request and check the response
if (($result = curl_exec($ch)) === FALSE) {
    die('cURL error: ' . curl_error($ch) . "<br />\n");
} else {
    echo "Success!<br />\n";
}
curl_close($ch);
print_r($result);
// Handle the response from a successful request
$xmlobj = simplexml_load_string($result);
var_dump($xmlobj);
?>
<html>
<head>
    <style>
        table {
            background: #fff;
            border: 1px solid #dadada;
            width: 500px;
        }

        table tbody tr {
            cursor: default;
        }

        table tfoot tr {
            background: #ccc;
        }

        .odd {
            background: #eee;
        }

        .even {
            background: #f6f6f6;
        }

        .hover {
            background: #fff000;
        }
    </style>
    <script>
        $(document).ready(function () {
                var loading = '<span>Aguarde...</span>';
                var $button = $('button');
                var click = false;

                // extend, para aplicar um zebra table
                $.fn.zebra = function () {
                    $('tbody tr:visible', this)
                        .filter(':odd').removeClass('even').addClass('odd')
                        .end()
                        .filter(':even').removeClass('odd').addClass('even');
                    return this;
                }

                $().ajaxStart(
                    function () {
                        $button.after(loading)
                    }
                ).ajaxStop(
                    function () {
                        $button.next().fadeOut('fast', function$(this).remove();
                    })
            }
        );

        $button.bind('click', function (click)
        click = true;
        $.ajax({
            type: 'GET',
            url: 'xml.php?xml=1',
            dataType: 'xml',
            success: function (xml) {
                var $table = $('table').find('tbody').empty().end();
                var $tr = null;
                $('funcionario', xml).each(function () {
                    $tr = document.createElement('tr');
                    $($tr).hover(
                        function () {
                            $(this).addClass('hover')
                        },
                        function () {
                            $(this).removeClass('hover')
                        }
                    ).bind('click', function () {
                            alert($('td:first', this).text())
                        });
                    $(this).children().each(function () {
                        $($tr).append('<td>' + $(this).text() + '</td>');
                    });
                    $table.append($tr);
                });
                $table.zebra().find('tfoot).text('
                time: '+new Date().getTime()).end().parent().show();
                click = false;
            }
        });
        })
        })
    </script>
</head>
<body>
<button>Get XML</button>
<div id="result" style="display:none">
</div>
</body>
</html>
