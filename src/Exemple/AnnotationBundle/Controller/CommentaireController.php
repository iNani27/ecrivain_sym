<?php

namespace Exemple\AnnotationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Exemple\AnnotationBundle\Entity\Commentaire;
use Exemple\AnnotationBundle\Form\CommentaireType;

/**
 * Commentaire controller.
 *
 * @Route("/commentaire")
 */
class CommentaireController extends Controller
{

    /**
     * Lists all Commentaire entities.
     *
     * @Route("/", name="commentaire")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ExempleAnnotationBundle:Commentaire')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Commentaire entity.
     *
     * @Route("/", name="commentaire_create")
     * @Method("POST")
     * @Template("ExempleAnnotationBundle:Commentaire:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Commentaire();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('commentaire_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Commentaire entity.
     *
     * @param Commentaire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Commentaire $entity)
    {
        $form = $this->createForm(new CommentaireType(), $entity, array(
            'action' => $this->generateUrl('commentaire_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Commentaire entity.
     *
     * @Route("/new", name="commentaire_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Commentaire();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Commentaire entity.
     *
     * @Route("/{id}", name="commentaire_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExempleAnnotationBundle:Commentaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commentaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Commentaire entity.
     *
     * @Route("/{id}/edit", name="commentaire_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExempleAnnotationBundle:Commentaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commentaire entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Commentaire entity.
    *
    * @param Commentaire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Commentaire $entity)
    {
        $form = $this->createForm(new CommentaireType(), $entity, array(
            'action' => $this->generateUrl('commentaire_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Commentaire entity.
     *
     * @Route("/{id}", name="commentaire_update")
     * @Method("PUT")
     * @Template("ExempleAnnotationBundle:Commentaire:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ExempleAnnotationBundle:Commentaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commentaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('commentaire_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Commentaire entity.
     *
     * @Route("/{id}", name="commentaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ExempleAnnotationBundle:Commentaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Commentaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('commentaire'));
    }

    /**
     * Creates a form to delete a Commentaire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commentaire_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
