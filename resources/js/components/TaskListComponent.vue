<template>
  <div class="container">
    <div v-if="user">
      <p>名前: {{ user.name }}</p>
      <p>メールアドレス: {{ user.email }}</p>
      <button type="button" @click="logout">ログアウト</button>
    </div>
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
          <th scope="col">Person In Charge</th>
          <th scope="col">Show</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in tasks" :key="task.test">
          <th scope="row">{{ task.id }}</th>

          <td>{{ task.title }}</td>

          <td>{{ task.content }}</td>

          <td>{{ task.person_in_charge }}</td>

          <td>
            <router-link
              v-bind:to="{ name: 'task.show', params: { taskId: task.id } }"
            >
              <button class="btn btn-primary">Show</button>
            </router-link>
          </td>

          <td>
            <router-link
              v-bind:to="{ name: 'task.edit', params: { taskId: task.id } }"
            >
              <button class="btn btn-success">Edit</button>
            </router-link>
          </td>

          <td>
            <button @click="deleteTask(task.id)" class="btn btn-danger">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data: () => {
    return {
      user: "",
      tasks: [],
    };
  },
  methods: {
    getTasks() {
      axios
        .get("/api/tasks")
        .then((res) => {
          //   Object.assign(this.tasks, res.data);
          this.tasks = res.data;
        })
        .catch((err) => {
          alert(err);
        });
    },
    deleteTask(id) {
      axios.delete("/api/tasks/" + id).then((res) => {
        //TODO: 完了アラートを出したい
        this.getTasks();
      });
    },
    logout() {
      axios
        .post("api/logout")
        .then((res) => {
          console.log(res);
          this.$router.push("/login");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  mounted() {
    axios.get("/api/user").then((res) => {
      console.log(res);
      this.user = res.data;
    });
    this.getTasks();
  },
};
</script>
