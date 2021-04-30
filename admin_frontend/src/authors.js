import * as React from "react";
import { List, Datagrid, Edit, Create, SimpleForm, TextField, TextInput, EditButton } from 'react-admin';
import BookIcon from '@material-ui/icons/Book';
export const AuthorIcon = BookIcon;

export const AuthorList = (props) => (
    <List {...props}>
        <Datagrid>
            <TextField source="id" />
            <TextField source="name" />
            <EditButton basePath="/authors" />
        </Datagrid>
    </List>
);

const AuthorTitle = ({ record }) => {
    return <span>Author {record ? `"${record.name}"` : ''}</span>;
};

export const AuthorEdit = (props) => (
    <Edit title={<AuthorTitle />} {...props}>
        <SimpleForm>
            <TextInput disabled source="id" />
            <TextInput source="name" />
        </SimpleForm>
    </Edit>
);

export const AuthorCreate = (props) => (
    <Create title="Create a Author" {...props}>
        <SimpleForm>
            <TextInput source="id" />
            <TextInput source="name" />
        </SimpleForm>
    </Create>
);