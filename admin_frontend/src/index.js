import * as React from "react";
import { render } from 'react-dom';
import { Admin, Resource } from 'react-admin';
import simpleRestProvider from 'ra-data-simple-rest';
import BookIcon from '@material-ui/icons/Book';

import { AuthorList, AuthorEdit, AuthorCreate, AuthorIcon } from './authors';
import { BookList, BookEdit, BookCreate } from './books';

render(
    <Admin dataProvider={simpleRestProvider('http://localhost:8000/admin/api')}>
        <Resource name="authors" list={AuthorList} edit={AuthorEdit} create={AuthorCreate} icon={AuthorIcon}/>
        <Resource name="books" list={BookList} edit={BookEdit} create={BookCreate} icon={BookIcon}/>
    </Admin>,
    document.getElementById('root')
);