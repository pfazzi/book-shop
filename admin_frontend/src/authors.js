import * as React from "react";
import {List, Datagrid, Edit, Create, SimpleForm, TextField, TextInput, EditButton, required} from 'react-admin';
import BookIcon from '@material-ui/icons/Book';
import { v4 as uuidv4 } from 'uuid';

export const AuthorIcon = BookIcon;

export const AuthorList = (props) => (
    <List {...props}>
        <Datagrid>
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
            <TextInput source="name" validate={[required()]} />
        </SimpleForm>
    </Edit>
);

export const AuthorCreate = (props) => (
    <Create title="Create a Author" {...props}>
        <SimpleForm>
            <TextInput source="id" initialValue={uuidv4()} validate={[required()]} disabled />
            <TextInput source="name" validate={[required()]} />
        </SimpleForm>
    </Create>
);