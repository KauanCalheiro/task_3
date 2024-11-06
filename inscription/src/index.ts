import express, { Application, Request, Response } from 'express'
import routes from './routes/api';

const app: Application = express();

app.use(express.json());
app.use('/api', routes);

app.listen(3000, () => {
    console.log(`Server is running on port ${3000}`);
});