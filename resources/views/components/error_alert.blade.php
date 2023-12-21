<div id="alert" class="fixed top-0 right-0 p-4" style="display: block;">
    <div class="bg-red-500 text-white p-4 rounded-lg flex items-center space-x-8">
        <div>
            <p class="font-bold">Error!</p>
            <p>{{ $message }}</p>
        </div>
        <button id="closeButton" class="text-white hover:" onclick="closeAlert()">&times;</button>
    </div>
</div>

<script>
    function closeAlert() {
        document.getElementById('alert').style.display = 'none';
    }
</script>
