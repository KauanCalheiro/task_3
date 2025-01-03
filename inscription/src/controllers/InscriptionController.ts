import { Request, Response } from "express";
import Inscription from "../models/Inscription";
import { Error } from "sequelize";

class InscriptionController {
    static async show(_: Request, res: Response) {
        try {
            const events = await Inscription.findAll();
            return res.json(events);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async getInscriptionsForUser(req: Request, res: Response)
    {
        try 
        {
            const userId = req.params.ref_user;

            const inscriptions = await Inscription.findAll({
                where: {
                ref_user: userId,
                },
            });
            if (inscriptions.length === 0) {
                return res.status(404).json({ message: 'No inscriptions found for this user.' });
            }
        
            return res.json(inscriptions);

        } 
        catch (error: Error | any) 
        {
            return res.status(500).json({ error: error.message });
        }
    }

    static async index(req: Request, res: Response) {
        try {
            const event = await Inscription.findByPk(req.params.id);
            return res.json(event);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async store(req: Request, res: Response) {
        try {
            const event = await Inscription.create(req.body);
            return res.json(event);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async update(req: Request, res: Response) {
        try {
            const event = await Inscription.findByPk(req.params.id);
            await event?.update(req.body);
            return res.json(event);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async destroy(req: Request, res: Response) {
        try {
            const event = await Inscription.findByPk(req.params.id);
            await event?.destroy();
            return res.json(event);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }
}

export default InscriptionController;