<form action="https://www.app.fattura24.com/api/v0.3/GetFile" id="invoices-download" method="post">
    <input type="hidden" name="apiKey" value="{{ env('FATTURA24_API_KEY') }}">
    <input type="hidden" name="docId" value="7758755">
</form>
<a onclick="event.preventDefault();document.getElementById('invoices-download').submit();" href="javascript:void(0)" class="btn btn-primary btn-circle"><i class="fas fa-file-pdf"></i>Download</a>
