var timerflag = 0;

var mainFunction = function() {
  var worktime = 0;
  var breaktime = 0;
  var wtime = 0;
  var btime = 0;
  var workend = 0;
  var breakend =0;
  var display = document.querySelector('#time');

  $("#start-btn").click(function(){
  worktime = document.getElementById('work-time').value;
  wtime = worktime * 60 * 1000;
  breaktime = document.getElementById('break-time').value;
  btime = breaktime * 60 * 1000;
  if(worktime == "" || breaktime == "") {
    alert("Please Enter Both WorkTime and BreakTime Values.");
  }
  else {
    alert("Please do NOT REFRESH or CLOSE this page until the Timer Stops.");
    timerflag = 1;
    initTimer(wtime);
  }
});

function formatTimer(timer) {

  var minutes = Math.floor((timer / 1000 / 60) % 60);
  var seconds = Math.floor((timer / 1000) % 60);

  minutes = minutes < 10 ? "0" + minutes : minutes;
  seconds = seconds < 10 ? "0" + seconds : seconds;

  return minutes + ":" + seconds;
}

function initTimer(wtime) {
  document.getElementById('timer-text').innerHTML = "Break Session starts in :";
  workend = setInterval(workTimer, 1000);
}

function workTimer() {

  console.log("worktime");

    if(wtime > 0)
    {
      display.textContent = formatTimer(wtime);
      document.title = display.textContent;
      wtime = wtime - 1000;

    } else if (wtime == 0) {
      document.getElementById("session-beep").play();
      alert("Time for a Break !!");
      clearInterval(workend);
      document.getElementById('timer-text').innerHTML = "Work Session starts in :";
      breakend = setInterval(breakTimer, 1000);
    }
  }

  function breakTimer() {
    
    console.log("breaktime");

    if(btime > 0) {
      display.textContent = formatTimer(btime);
      document.title = display.textContent;
      btime = btime - 1000;

    } else if(btime <= 0) {
      var audioplay = document.getElementById("session-beep").play();
      alert("Let's get back to Work !!");
      clearInterval(breakend);
      document.getElementById('timer-text').innerHTML = "Today's Time :";
      timerflag = 0;
      document.title = "TimePlease";
      document.getElementById('work-time').value = "";
      document.getElementById('break-time').value = "";
      currentTime();
    }
  }
};
$(document).ready(mainFunction);