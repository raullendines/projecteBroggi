<template>
  <div class="mt-3 container-video">
    <h1 class="text-center">{{ title }}</h1>
    <video id="myVideo" :width="width" :height="height" :src="videoUrl"></video>
    <br />
    <div v-if="question === true">
      <v-btn
        elevation="2"
        @click="answer(1)"
        class="m-2"
        style="color: #4fbf58"
      >
        Si
      </v-btn>
      <v-btn
        elevation="2"
        @click="answer(0)"
        class="m-2"
        style="color: #f90173"
      >
        No
      </v-btn>
    </div>
    <div>
      <v-btn
        elevation="2"
        @click="playStop()"
        class="m-2"
        style="color: #00b0c8"
        v-if="restartVideo === false"
      >
        <i class="fas fa-play"></i>
        Play
      </v-btn>
      <v-btn
        elevation="2"
        @click="restartVid()"
        class="m-2"
        style="color: #00b0c8"
        v-else
      >
        <i class="fas fa-redo"></i>
        Restart
      </v-btn>
    </div>
  </div>
</template>

<style>
.container-video {
  width: 75%;
  margin: auto;
}
</style>

<script>
export default {
  data() {
    return {
      title: "Video d'Ajuda",
      videoUrl: "videoFolder/helpVideo.mp4",
      width: "100%",
      height: "550px",
      question: "",
      intervalTime: 0,
      alertMsg: "",
      restartVideo: "",
    };
  },
  methods: {
    getIdVideo() {
      let myVideo = document.getElementById("myVideo");
      return myVideo;
    },
    restartVid() {
      let myVideo = this.getIdVideo();
      myVideo.pause();
      myVideo.currentTime = 0;
      clearInterval(this.intervalTime);
      this.restartVideo = false;
    },
    playStop() {
      let myVideo = this.getIdVideo();
      /* if (myVideo.paused) { */
      myVideo.play();
      if (myVideo.currentTime <= 19) {
        this.getTimeVideo(19);
      }
      this.restartVideo = true;
      /*       } else {
        myVideo.pause();
      } */
    },
    skip(value) {
      let myVideo = this.getIdVideo();
      myVideo.currentTime += value;
    },
    restart() {
      let myVideo = getIdVideo();
      myVideo.currentTime = 0;
    },
    stopVideo(value) {
      this.question = false;
      let myVideo = this.getIdVideo();
      if (myVideo.currentTime <= value && myVideo.currentTime >= value - 1) {
        if (
          value === 39 ||
          value === 50 ||
          value === 95 ||
          value === 89 ||
          value === 84
        ) {
          myVideo.currentTime = 0;
          myVideo.pause();
          clearInterval(this.intervalTime);
        } else if (value === 103) {
          //fixed this
          myVideo.currentTime = 73;
        } else {
          this.question = true;
          myVideo.pause();
          clearInterval(this.intervalTime);
        }
      } else if (myVideo.currentTime <= 75 && myVideo.currentTime >= 74) {
        this.question = true;
        myVideo.pause();
        clearInterval(this.intervalTime);
      } else {
        myVideo.play();
      }
    },
    answer(value) {
      let myVideo = this.getIdVideo();
      //no
      if (value === 0) {
        if (myVideo.currentTime <= 19 && myVideo.currentTime >= 18) {
          myVideo.currentTime += 4;
          this.getTimeVideo(29);
        } else if (myVideo.currentTime <= 28 && myVideo.currentTime >= 27) {
          myVideo.currentTime = 0;
          myVideo.pause();
          this.question = false;
          clearInterval(this.intervalTime);
        } else if (myVideo.currentTime <= 30 && myVideo.currentTime >= 29) {
          myVideo.currentTime += 10;
          this.getTimeVideo(42);
        } else if (myVideo.currentTime <= 42 && myVideo.currentTime >= 41) {
          myVideo.currentTime += 9;
          this.getTimeVideo(54);
        } else if (myVideo.currentTime <= 54 && myVideo.currentTime >= 53) {
          myVideo.currentTime += 42;
          this.getTimeVideo(103);
        } else if (myVideo.currentTime <= 64 && myVideo.currentTime >= 63) {
          myVideo.currentTime += 25;
          this.getTimeVideo(95);
        } else if (myVideo.currentTime <= 75 && myVideo.currentTime >= 74) {
          myVideo.currentTime += 9;
          this.getTimeVideo(89);
        }
        //si
      } else if (value === 1) {
        if (myVideo.currentTime <= 19 && myVideo.currentTime >= 18) {
          myVideo.currentTime += 10;
          this.getTimeVideo(30);
        } else if (myVideo.currentTime <= 30 && myVideo.currentTime >= 29) {
          myVideo.currentTime += 4;
          this.getTimeVideo(39);
        } else if (myVideo.currentTime <= 42 && myVideo.currentTime >= 41) {
          myVideo.currentTime += 3;
          this.getTimeVideo(50);
        } else if (myVideo.currentTime <= 54 && myVideo.currentTime >= 53) {
          myVideo.currentTime += 3;
          this.getTimeVideo(64);
        } else if (myVideo.currentTime <= 64 && myVideo.currentTime >= 63) {
          myVideo.currentTime += 3;
          this.getTimeVideo(75);
        } else if (myVideo.currentTime <= 75 && myVideo.currentTime >= 74) {
          myVideo.currentTime += 3;
          this.getTimeVideo(84);
        }
      }
    },
    getTimeVideo(val) {
      this.intervalTime = setInterval(() => {
        this.stopVideo(val);
      }, 500);
    },
  },
  created() {
    this.question = false;
    this.restartVideo = false;
  }
};
</script>
