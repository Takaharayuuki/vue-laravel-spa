<template>
  <div>
    <h2>ログイン</h2>
    <p class="mt-2 text-danger">{{ getUserMessage }}</p>
    <form @submit.prevent="login">
      <label>
        <input type="email" placeholder="email" v-model="email" />
      </label>
      <label>
        <input type="pass" placeholder="password" v-model="pass" />
      </label>
      <br />
      <button type="submit">ログイン</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      pass: "",
      error: false,
      getUserMessage: "",
    };
  },
  methods: {
    login() {
      axios
        .get("sanctum/csrf-cookie")
        .then((res) => {
          axios
            .post("/api/login", {
              email: this.email,
              password: this.pass,
            })
            .then((res) => {
              if (res.data.status_code == 200) {
                this.$router.push("/tasks");
              }
              this.getUserMessage = "200じゃないログインに失敗しました";
            })
            .catch((err) => {
              console.log(err);
              this.getUserMessage = "ログインに失敗しました。";
            });
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
