import { Router } from "express";
import InscriptionController from "../controllers/InscriptionController";

const inscriptionRouter = Router();

inscriptionRouter.get('/', (req, res) => {
    InscriptionController.show(req, res)
});

inscriptionRouter.get('/:id', (req, res) => {
    InscriptionController.index(req, res)
});

inscriptionRouter.post('/', (req, res) => {
    InscriptionController.store(req, res)
});

inscriptionRouter.put('/:id', (req, res) => {
    InscriptionController.update(req, res)
});

inscriptionRouter.delete('/:id', (req, res) => {
    InscriptionController.destroy(req, res)
});

export default inscriptionRouter;