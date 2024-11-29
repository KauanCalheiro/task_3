import { Request, Response } from "express";
import Event from "../models/Events";
import Inscription from "../models/Events";
import { Error } from "sequelize";

class EventController {
    static async show(_: Request, res: Response) {
        try {
            const events = await Event.findAll();
            return res.json(events);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async index(req: Request, res: Response) {
        try {
            const event = await Event.findByPk(req.params.id);
            return res.json(event);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async getEventsForPessoa(req: Request, res: Response)
    {
        const userId = req.user.id;

        const eventsInscritos = await Inscription.findAll({
            where: { ref_user: userId },
            attributes: ['ref_event'], 
        });

      // Extrair os ids dos eventos nos quais o usuário está inscrito
      const eventIds = eventsInscritos.map((inscription: any) => inscription.ref_event);

      // Obter todos os eventos
      const events = await Event.findAll();

      // Adicionar o campo fl_inscrito a cada evento
      const eventsWithInscriptionStatus = events.map((event: any) => {
        event.fl_inscrito = eventIds.includes(event.id);
        return event;
      });

      return res.json(eventsWithInscriptionStatus);  // Retornar os eventos com fl_inscrito
    } catch (error: any) {
      return res.status(500).json({ error: error.message });  // Retornar erro se ocorrer algum problema
    }

    } 

    static async store(req: Request, res: Response) {
        try {
            const event = await Event.create(req.body);
            return res.json(event);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async update(req: Request, res: Response) {
        try {
            const event = await Event.findByPk(req.params.id);
            await event?.update(req.body);
            return res.json(event);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async destroy(req: Request, res: Response) {
        try {
            const event = await Event.findByPk(req.params.id);
            await event?.destroy();
            return res.json(event);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }
}

export default EventController;