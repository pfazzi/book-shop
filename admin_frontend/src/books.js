import * as React from "react";
import { List, Datagrid, Edit, Create, SimpleForm, TextField, TextInput, EditButton, ReferenceInput, SelectInput, required } from 'react-admin';
import { v4 as uuidv4 } from 'uuid';

export const BookList = (props) => (
    <List {...props}>
        <Datagrid>
            <TextField source="isbn" />
            <TextField source="title" />
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
            <TextInput source="isbn" />
            <TextInput source="title" />
            <ReferenceInput label="Author" source="authorId" reference="authors" validate={[required()]}>
                <SelectInput optionText="name" />
            </ReferenceInput>
        </SimpleForm>
    </Edit>
);

export const BookCreate = (props) => (
    <Create title="Create a Book" {...props}>
        <SimpleForm>
            <TextInput source="id" initialValue={uuidv4()} disabled hidden />
            <TextInput source="isbn" validate={[required()]} />
            <TextInput source="title" validate={[required()]} />
            <ReferenceInput label="Author" source="authorId" reference="authors" validate={[required()]}>
                <SelectInput optionText="name" />
            </ReferenceInput>
        </SimpleForm>
    </Create>
);