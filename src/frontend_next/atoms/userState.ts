import { atom } from 'recoil';
import {User} from "@/types/model/User";

export const userState = atom<User>({
    key: 'userState',
    default: undefined
});
