document.addEventListener('DOMContentLoaded', function() {
    const decreaseButton = document.getElementById('decrease');
    const increaseButton = document.getElementById('increase');
    const playersCount = document.getElementById('playersCount');
    const piratesDiv = document.getElementById('pirates');
    const marinsDiv = document.getElementById('marins');
    const sireneDiv = document.getElementById('sirene');

    const distributionData = {
        7: { pirates: 3, marins: 3, sirene: 1 },
        8: { pirates: 3, marins: 4, sirene: 1 },
        9: { pirates: 4, marins: 4, sirene: 1 },
        10: { pirates: 4, marins: 5, sirene: 1 },
        11: { pirates: 5, marins: 5, sirene: 1 },
        12: { pirates: 5, marins: 6, sirene: 1 },
        13: { pirates: 6, marins: 6, sirene: 1 },
        14: { pirates: 6, marins: 7, sirene: 1 },
        15: { pirates: 7, marins: 7, sirene: 1 },
        16: { pirates: 7, marins: 8, sirene: 1 },
        17: { pirates: 8, marins: 8, sirene: 1 },
        18: { pirates: 8, marins: 9, sirene: 1 },
        19: { pirates: 9, marins: 9, sirene: 1 },
        20: { pirates: 9, marins: 10, sirene: 1 }
    };

    function updateCounts(players) {
        playersCount.textContent = players;
        piratesDiv.textContent = distributionData[players].pirates;
        marinsDiv.textContent = distributionData[players].marins;
        sireneDiv.textContent = distributionData[players].sirene;
    }

    decreaseButton.addEventListener('click', function () {
        let players = parseInt(playersCount.textContent);
        if (players > 7) {
            players--;
            updateCounts(players);
        }
    });

    increaseButton.addEventListener('click', function () {
        let players = parseInt(playersCount.textContent);
        if (players < 20) {
            players++;
            updateCounts(players);
        }
    });

    updateCounts(parseInt(playersCount.textContent));
});