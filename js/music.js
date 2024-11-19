const player = document.getElementById('music-player');


const savedTime = localStorage.getItem('music-time');
if (savedTime) player.currentTime = savedTime;


player.addEventListener('timeupdate', () => {
    localStorage.setItem('music-time', player.currentTime);
});
