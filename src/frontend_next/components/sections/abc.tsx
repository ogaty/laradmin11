import React from 'react';
import {Tea} from '@/types/tea';

const Abc : React.FC = () => {
    let t:Tea = {
        firstName: "firstName",
        lastName: "lastName"
    }
    return <h2>{ `name:` + t.firstName }</h2>
}

export default Abc