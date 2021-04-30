import * as React from "react";
import { List, Datagrid, Edit, Create, SimpleForm, TextField, TextInput, EditButton } from 'react-admin';

export const BookList = (props) => (
    <List {...props}>
        <Datagrid>
            <TextField source="id" />
            <TextField source="name" />
            <EditButton basePath="/books" />
        </Datagrid>
    </List>
);

const BookTitle = ({ record }) => {
    return <span>Book {record ? `"${record.name}"` : ''}</span>;
};

export const BookEdit = (props) => (
    <Edit title={<BookTitle />} {...props}>
        <SimpleForm>
            <TextInput disabled source="id" />
            <TextInput source="title" />
        </SimpleForm>
    </Edit>
);

export const BookCreate = (props) => (
    <Create title="Create a Book" {...props}>
        <SimpleForm>
            <TextInput source="id" />
            <TextInput source="title" />
        </SimpleForm>
    </Create>
);