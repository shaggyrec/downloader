require('./bootstrap');

document.getElementById('downloadForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const textInput = document.getElementById('srcForDownload');
    const src = document.getElementById('srcForDownload').value;
    if (src) {
        textInput.value = '';
        axios.post('/api/to-queue', { src })
            .then(() => setTimeout(requestFiles, 1000));
    }
});

requestFiles();

function requestFiles() {
    axios.get('/api/files')
    .then(response => {
        if (response.data.length > 0) {
            document.getElementById('filesListContainer').style.display = 'block';
            const filesList = document.getElementById('filesList');
            filesList.innerHTML = '';
            response.data.map(file => {
                filesList.innerHTML += renderRow(file);
            });
        }
    });
}
function renderRow(file) {
    return `
<tr>
    <td>${file.src}</td>
    <td>${file.status}</td>
    <td>${file.url ? `<a href="storage/${file.url}" target="_blank">download</a>` : ''}</td>
</tr>
`;
}
