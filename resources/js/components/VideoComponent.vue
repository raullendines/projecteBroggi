<template>
  <div class="mt-3 container-video">
    <h1 class="text-center">{{ title }}</h1>
    <video
      id="myVideo"
      :width="width"
      :height="height"
      controls
      :src="videoUrl"
    ></video>
    <br />
    <v-btn elevation="2" @click="playStop()" class="m-2">
      <i class="fas fa-play"></i> / <i class="fas fa-pause"></i>
    </v-btn>
    <v-btn elevation="2" @click="skip(-10)" class="m-2">
      <i class="fas fa-backward"></i> 10s
    </v-btn>
    <v-btn elevation="2" @click="skip(10)" class="m-2">
      <i class="fas fa-forward"></i>10s
    </v-btn>
    <v-btn elevation="2" @click="restart()" class="m-2">
      <i class="fas fa-undo"></i>
    </v-btn>
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
      title: "Video Ayuda",
      videoUrl: "videoFolder/helpVideo.mp4",
      width: "100%",
      height: "550px",
    };
  },
  methods: {
    getIdVideo() {
      let myVideo = document.getElementById("myVideo");
      return myVideo;
    },
    playStop() {
      let myVideo = this.getIdVideo();
      if (myVideo.paused) {
        myVideo.play();
      } else {
        myVideo.pause();
      }
    },
    skip(value) {
      let myVideo = this.getIdVideo();
      myVideo.currentTime += value;
    },
    restart() {
      let myVideo = getIdVideo();
      myVideo.currentTime = 0;
    },
  },
};
</script>
