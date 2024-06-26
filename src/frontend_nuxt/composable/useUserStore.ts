import { defineStore } from "pinia";
import type {User} from "~/types/model/User";

export const useUserStore = defineStore('user', {
  state: () => ({
    u: {
      id: 0,
      name: "",
      email: ""
    } as User
  }),
  getters: {
    getUser: (state) => {
      return state.u
    }
  },
  actions: {
    set(u: User) {
      this.u = u
    }
  }
});
