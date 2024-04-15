<script>
    function strToJsObject(jsonString ){
        const decodedJsonString = jsonString.replace(/&quot;/g, '"');
        return JSON.parse(decodedJsonString);
    }
</script>