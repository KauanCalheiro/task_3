import { Router } from "express";
import InscriptionController from "../controllers/InscriptionController";

const eventRouter = Router();

eventRouter.get('/', (req, res) => {
    InscriptionController.show(req, res)
});

eventRouter.get('/:id', (req, res) => {
    InscriptionController.index(req, res)
});

eventRouter.post('/', (req, res) => {
    InscriptionController.store(req, res)
});

eventRouter.put('/:id', (req, res) => {
    InscriptionController.update(req, res)
});

eventRouter.delete('/:id', (req, res) => {
    InscriptionController.destroy(req, res)
});

export default eventRouter;