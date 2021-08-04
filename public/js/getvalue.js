let emot1 = document.getElementById('emot1');
let emot2 = document.getElementById('emot2');
let emot3 = document.getElementById('emot3');
let emot4 = document.getElementById('emot4');
let emot5 = document.getElementById('emot5');

emot1.addEventListener('click', function () {
    alert('beribu permintaan maaf kami ucapkan, kami akan intropeksi dan perbaiki pelayanan kami');
    axios.get('/emot1', {
        params: {
            emot1: 1,
            emot2: 0,
            emot3: 0,
            emot4: 0,
            emot5: 0,
        }
    })
});
emot2.addEventListener('click', function () {
    alert('Mohon maaf kami akan memperbaiki pelayanan kami.')
    axios.get('/emot2', {
        params: {
            emot1: 0,
            emot2: 1,
            emot3: 0,
            emot4: 0,
            emot5: 0,
        }
    })
})
emot3.addEventListener('click', function () {
    alert('Terima kasih. Kami akan meningkatkan pelayanan kami.')
    axios.get('/emot3', {
        params: {
            emot1: 0,
            emot2: 0,
            emot3: 1,
            emot4: 0,
            emot5: 0,
        }
    })
})
emot4.addEventListener('click', function () {
    alert('Terima kasih banyak.')
    axios.get('/emot4', {
        params: {
            emot1: 0,
            emot2: 0,
            emot3: 0,
            emot4: 1,
            emot5: 0,
        }
    })
})
emot5.addEventListener('click', function () {
    alert('Terima kasih banyak. Kami akan mempertahankan pelayanan kami.')
    axios.get('/emot5', {
        params: {
            emot1: 0,
            emot2: 0,
            emot3: 0,
            emot4: 0,
            emot5: 1,
        }
    })
})
